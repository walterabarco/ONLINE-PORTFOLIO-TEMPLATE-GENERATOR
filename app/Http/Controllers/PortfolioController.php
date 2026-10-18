<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = auth()->user()
            ->portfolios()
            ->latest()
            ->paginate(10);

        return view('portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('portfolios.create', [
            'templates' => Portfolio::TEMPLATES,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validatePortfolio($request);

        $data = $validated;
        unset($data['profile_picture']);

        $sections = $this->extractSections($data);

        $picturePath = null;

        if ($request->hasFile('profile_picture')) {
            $picturePath = $request->file('profile_picture')
                ->store('portfolio-profiles', 'public');

            $data['profile_picture_path'] = $picturePath;
        }

        $data['is_published'] = false;

        try {
            DB::transaction(function () use ($data, $sections) {
                $portfolio = auth()->user()
                    ->portfolios()
                    ->create($data);

                $this->saveSections($portfolio, $sections);
            });
        } catch (\Throwable $exception) {
            if ($picturePath) {
                Storage::disk('public')->delete($picturePath);
            }

            throw $exception;
        }

        return redirect()
            ->route('portfolios.index')
            ->with('success', 'Portfolio created successfully!');
    }

    public function show(string $slug)
    {
        $portfolio = Portfolio::query()
            ->where('slug', $slug)
            ->where('is_published', true)
            ->with([
                'educations',
                'skills',
                'projects',
                'experiences',
                'socialLinks',
            ])
            ->firstOrFail();

        return view('portfolios.show', compact('portfolio'));
    }

    public function preview(Portfolio $portfolio)
    {
        $portfolio = auth()->user()
            ->portfolios()
            ->with([
                'educations',
                'skills',
                'projects',
                'experiences',
                'socialLinks',
            ])
            ->findOrFail($portfolio->id);

        return view('portfolios.show', compact('portfolio'));
    }

    public function edit(Portfolio $portfolio)
    {
        $portfolio = auth()->user()
            ->portfolios()
            ->with([
                'educations',
                'skills',
                'projects',
                'experiences',
                'socialLinks',
            ])
            ->findOrFail($portfolio->id);

        return view('portfolios.edit', [
            'portfolio' => $portfolio,
            'templates' => Portfolio::TEMPLATES,
        ]);
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $portfolio = auth()->user()
            ->portfolios()
            ->findOrFail($portfolio->id);

        $validated = $this->validatePortfolio($request, true);

        $data = $validated;
        unset($data['profile_picture']);

        $sections = $this->extractSections($data);

        $oldPicture = $portfolio->profile_picture_path;
        $newPicture = null;

        if ($request->hasFile('profile_picture')) {
            $newPicture = $request->file('profile_picture')
                ->store('portfolio-profiles', 'public');

            $data['profile_picture_path'] = $newPicture;
        }

        try {
            DB::transaction(function () use (
                $portfolio,
                $data,
                $sections
            ) {
                $portfolio->update($data);

                $this->saveSections($portfolio, $sections);
            });
        } catch (\Throwable $exception) {
            if ($newPicture) {
                Storage::disk('public')->delete($newPicture);
            }

            throw $exception;
        }

        if ($newPicture && $oldPicture) {
            Storage::disk('public')->delete($oldPicture);
        }

        return redirect()
            ->route('portfolios.index')
            ->with(
                'success',
                $portfolio->is_published
                    ? 'Portfolio saved and published successfully!'
                    : 'Portfolio saved as a draft.'
            );
    }

    public function destroy(Portfolio $portfolio)
    {
        $portfolio = auth()->user()
            ->portfolios()
            ->findOrFail($portfolio->id);

        if ($portfolio->profile_picture_path) {
            Storage::disk('public')->delete(
                $portfolio->profile_picture_path
            );
        }

        $portfolio->delete();

        return redirect()
            ->route('portfolios.index')
            ->with('success', 'Portfolio deleted successfully!');
    }

    private function validatePortfolio(
        Request $request,
        bool $updating = false
    ): array {
        $currentYear = (int) date('Y');

        $rules = [
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'address' => ['nullable', 'string', 'max:255'],
            'about' => ['required', 'string'],
            'template' => [
                'required',
                Rule::in(Portfolio::TEMPLATES),
            ],
            'profile_picture' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'educations' => ['sometimes', 'array', 'max:20'],
            'educations.*.school' => [
                'required', 'string', 'max:255',
            ],
            'educations.*.degree' => [
                'required', 'string', 'max:255',
            ],
            'educations.*.start_year' => [
                'nullable', 'integer', 'min:1900',
                'max:' . ($currentYear + 10),
            ],
            'educations.*.end_year' => [
                'nullable', 'integer', 'min:1900',
                'max:' . ($currentYear + 10),
            ],
            'educations.*.is_present' => [
                'sometimes', 'boolean',
            ],

            'skills' => ['sometimes', 'array', 'max:50'],
            'skills.*.name' => [
                'required', 'string', 'max:255',
            ],

            'projects' => ['sometimes', 'array', 'max:50'],
            'projects.*.title' => [
                'required', 'string', 'max:255',
            ],
            'projects.*.description' => [
                'nullable', 'string',
            ],
            'projects.*.technologies' => [
                'nullable', 'string', 'max:2000',
            ],
            'projects.*.link' => [
                'nullable', 'url', 'max:2048',
            ],

            'experiences' => ['sometimes', 'array', 'max:30'],
            'experiences.*.job_title' => [
                'required', 'string', 'max:255',
            ],
            'experiences.*.company' => [
                'required', 'string', 'max:255',
            ],
            'experiences.*.start_date' => [
                'nullable', 'date',
            ],
            'experiences.*.end_date' => [
                'nullable', 'date',
            ],
            'experiences.*.is_current' => [
                'sometimes', 'boolean',
            ],
            'experiences.*.description' => [
                'nullable', 'string',
            ],

            'social_links' => ['sometimes', 'array', 'max:30'],
            'social_links.*.platform' => [
                'required', 'string', 'max:255',
            ],
            'social_links.*.url' => [
                'required', 'url', 'max:2048',
            ],
        ];

        if ($updating) {
            $rules['is_published'] = [
                'required', 'boolean',
            ];
        }

        return $request->validate($rules);
    }

    private function extractSections(array &$data): array
    {
        $sections = [];

        foreach ([
            'educations',
            'skills',
            'projects',
            'experiences',
            'social_links',
        ] as $key) {
            $sections[$key] = $data[$key] ?? [];
            unset($data[$key]);
        }

        return $sections;
    }

    private function saveSections(
        Portfolio $portfolio,
        array $sections
    ): void {
        $relationships = [
            'educations' => 'educations',
            'skills' => 'skills',
            'projects' => 'projects',
            'experiences' => 'experiences',
            'social_links' => 'socialLinks',
        ];

        foreach ($relationships as $key => $relationship) {
            $relation = $portfolio->{$relationship}();

            // Replace the section's entries with submitted entries.
            $relation->delete();

            foreach ($sections[$key] ?? [] as $item) {
                if ($key === 'educations') {
                    $item['is_present'] = (bool) (
                        $item['is_present'] ?? false
                    );
                }

                if ($key === 'experiences') {
                    $item['is_current'] = (bool) (
                        $item['is_current'] ?? false
                    );

                    if ($item['is_current']) {
                        $item['end_date'] = null;
                    }
                }

                $relation->create($item);
            }
        }
    }
}

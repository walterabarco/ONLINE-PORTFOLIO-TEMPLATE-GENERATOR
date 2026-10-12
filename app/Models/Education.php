<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education extends Model
{
    // Laravel would guess the table name "education"; ours is "educations".
    protected $table = 'educations';

    protected $fillable = [
        'portfolio_id',
        'school',
        'degree',
        'start_year',
        'end_year',
        'is_present',
    ];

    protected function casts(): array
    {
        return [
            'is_present' => 'boolean',
        ];
    }

    public function portfolio(): BelongsTo
    {
        return $this->belongsTo(Portfolio::class);
    }
}
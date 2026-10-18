@php
    $availableTemplates = ['simple', 'modern', 'creative'];

    $template = in_array($portfolio->template, $availableTemplates, true)
        ? $portfolio->template
        : 'simple';
@endphp

@include('portfolios.templates.' . $template)

<?php

declare(strict_types=1);

use App\Models\Tag;
use TimoKoerber\LaravelOneTimeOperations\OneTimeOperation;

return new class extends OneTimeOperation
{
    /**
     * Determine if the operation is being processed asynchronously.
     */
    protected bool $async = false;

    /**
     * Process the operation.
     */
    public function process(): void
    {
        $tags = [
            'PHP',
            'Filament',
            'Blade',
            'Inertia.js',
            'Livewire',
            'Alpine.js',
            'shadcn/ui',
            'shadcn/vue',
            'Flux',
            'JavaScript',
            'Vue.js',
            'React',
            'Angular',
            'Svelte',
            'HTMX',
            'Alpine AJAX',
            'CSS',
            'Tailwind CSS',
            'Bootstrap',
            'Bulma',
            'Foundation',
            'Materialize',
            'UIKit',
            'jQuery',
            'Lodash',
            'Underscore.js',
            'Moment.js',
            'Axios',
            'Fetch API',
            'XMLHttpRequest',
            'WebSockets',
            'REST API',
            'GraphQL',
            'Apollo Client',
            'Relay',
            'Redux',
            'Vuex',
            'Pinia',
            'Statamic',
            'Stimulus.js',
        ];

        foreach ($tags as $tag) {
            Tag::updateOrCreate([
                'name' => $tag,
            ]);
        }
    }
};

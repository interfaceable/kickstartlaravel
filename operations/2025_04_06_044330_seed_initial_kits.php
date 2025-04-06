<?php

declare(strict_types=1);

use App\Models\Kit;
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
        $kits = [
            [
                'name' => 'React',
                'slug' => 'laravel/react-starter-kit',
                'namespace' => 'laravel/react-starter-kit',
                'repo_url' => 'https://github.com/laravel/react-starter-kit',
                'tags' => ['JavaScript', 'Tailwind CSS', 'PHP', 'Inertia.js', 'React'],
                'is_official' => true,
            ],
            [
                'name' => 'Vue',
                'slug' => 'laravel/vue-starter-kit',
                'namespace' => 'laravel/vue-starter-kit',
                'repo_url' => 'https://github.com/laravel/vue-starter-kit',
                'tags' => ['JavaScript', 'Tailwind CSS', 'PHP', 'Vue.js', 'Inertia.js'],
                'is_official' => true,
            ],
            [
                'name' => 'Livewire',
                'slug' => 'laravel/livewire-starter-kit',
                'namespace' => 'laravel/livewire-starter-kit',
                'repo_url' => 'https://github.com/laravel/livewire-starter-kit',
                'tags' => ['PHP', 'Tailwind CSS', 'Livewire', 'Blade', 'Alpine.js'],
                'is_official' => true,
            ],
            [
                'name' => 'Statamic',
                'slug' => 'statamic/statamic',
                'namespace' => 'statamic/statamic',
                'repo_url' => 'https://github.com/statamic/statamic',
                'tags' => ['PHP', 'Statamic'],
                'is_official' => false,
            ],
            [
                'name' => 'Cachet',
                'slug' => 'cachethq/cachet',
                'namespace' => 'cachethq/cachet',
                'repo_url' => 'https://github.com/cachethq/cachet',
                'tags' => ['PHP'],
                'is_official' => false,
            ],
            [
                'name' => 'Svelte',
                'slug' => 'oseughu/svelte-starter-kit',
                'namespace' => 'oseughu/svelte-starter-kit',
                'repo_url' => 'https://github.com/oseughu/svelte-starter-kit',
                'tags' => ['PHP', 'JavaScript', 'Svelte', 'Inertia.js', 'Tailwind CSS'],
                'is_official' => false,
            ],
            [
                'name' => 'Wave',
                'slug' => 'devdojo/wave',
                'namespace' => 'thedevdojo/wave',
                'repo_url' => 'https://github.com/thedevdojo/wave',
                'tags' => ['PHP', 'Alpine.js', 'Tailwind CSS', 'Livewire', 'Blade'],
                'is_official' => false,
            ],
            [
                'name' => 'Genesis',
                'slug' => 'devdojo/genesis',
                'namespace' => 'thedevdojo/genesis',
                'repo_url' => 'https://github.com/thedevdojo/genesis',
                'tags' => ['PHP', 'Alpine.js', 'Tailwind CSS', 'Livewire', 'Blade', 'Folio', 'Volt'],
                'is_official' => false,
            ],
            [
                'name' => 'Filament',
                'slug' => 'tnylea/filamentapp',
                'namespace' => 'tnylea/filamentapp',
                'repo_url' => 'https://github.com/tnylea/filamentapp',
                'tags' => ['PHP', 'Tailwind CSS', 'Filament', 'Blade'],
                'is_official' => false,
            ],
            [
                'name' => 'Livewire Starter',
                'slug' => 'tnylea/livewire-starter',
                'namespace' => 'tnylea/livewire-starter',
                'repo_url' => 'https://github.com/tnylea/livewire-starter',
                'tags' => ['PHP', 'Tailwind CSS', 'Livewire', 'Blade'],
                'is_official' => false,
            ],
            [
                'name' => 'Larasonic React',
                'slug' => 'shipfastlabs/larasonic-react',
                'namespace' => 'shipfastlabs/larasonic-react',
                'repo_url' => 'https://github.com/shipfastlabs/larasonic-react',
                'tags' => ['JavaScript', 'Tailwind CSS', 'PHP', 'Inertia.js', 'React', 'Radix UI'],
                'is_official' => false,
            ],
            [
                'name' => 'Larasonic Vue',
                'slug' => 'shipfastlabs/larasonic-vue',
                'namespace' => 'shipfastlabs/larasonic-vue',
                'repo_url' => 'https://github.com/shipfastlabs/larasonic-vue',
                'tags' => ['JavaScript', 'Tailwind CSS', 'PHP', 'Vue.js', 'Inertia.js'],
                'is_official' => false,
            ],
            [
                'name' => 'TALL starter',
                'slug' => 'mortenebak/tallstarter',
                'namespace' => 'mortenebak/tallstarter',
                'repo_url' => 'https://github.com/mortenebak/tallstarter',
                'tags' => ['Tailwind CSS', 'PHP', 'Alpine.js', 'Livewire', 'Blade'],
                'is_official' => false,
            ],
            [
                'name' => 'Filament Zeus starters',
                'slug' => 'lara-zeus/zeus',
                'namespace' => 'lara-zeus/zeus',
                'repo_url' => 'https://github.com/lara-zeus/zeus',
                'tags' => ['PHP', 'Tailwind CSS', 'Filament', 'Blade'],
                'is_official' => false,
            ],
            [
                'name' => 'Modern Livewire Starter Kit',
                'slug' => 'shipfastlabs/modern-livewire-starter-kit',
                'namespace' => 'shipfastlabs/modern-livewire-starter-kit',
                'repo_url' => 'https://github.com/shipfastlabs/modern-livewire-starter-kit',
                'tags' => ['PHP', 'Tailwind CSS', 'Livewire', 'Blade'],
                'is_official' => false,
            ],
            [
                'name' => 'Modern Vue Starter Kit',
                'slug' => 'shipfastlabs/modern-vue-starter-kit',
                'namespace' => 'shipfastlabs/modern-vue-starter-kit',
                'repo_url' => 'https://github.com/shipfastlabs/modern-vue-starter-kit',
                'tags' => ['JavaScript', 'Tailwind CSS', 'PHP', 'Vue.js', 'Inertia.js'],
                'is_official' => false,
            ],
            [
                'name' => 'Modern React Starter Kit',
                'slug' => 'shipfastlabs/modern-react-starter-kit',
                'namespace' => 'shipfastlabs/modern-react-starter-kit',
                'repo_url' => 'https://github.com/shipfastlabs/modern-react-starter-kit',
                'tags' => ['JavaScript', 'Tailwind CSS', 'PHP', 'Inertia.js', 'React'],
                'is_official' => false,
            ],
            [
                'name' => 'React JSX Starter Kit',
                'slug' => 'YazidKHALDI/react-jsx-starter-kit',
                'namespace' => 'YazidKHALDI/react-jsx-starter-kit',
                'repo_url' => 'https://github.com/YazidKHALDI/react-jsx-starter-kit',
                'tags' => ['JavaScript', 'Tailwind CSS', 'PHP', 'Inertia.js', 'React'],
                'is_official' => false,
            ],
            [
                'name' => 'Unstyled Blade Starter Kit',
                'slug' => 'javdome/unstyled-blade-starter-kit',
                'namespace' => 'javdome/unstyled-blade-starter-kit',
                'repo_url' => 'https://github.com/javdome/unstyled-blade-starter-kit',
                'tags' => ['PHP', 'Tailwind CSS', 'Blade'],
                'is_official' => false,
            ],
            [
                'name' => 'Tablar Starter Kit',
                'slug' => 'takielias/tablar-starter-kit',
                'namespace' => 'takielias/tablar-starter-kit',
                'repo_url' => 'https://github.com/takielias/tablar-starter-kit',
                'tags' => ['PHP'],
                'is_official' => false,
            ],
            [
                'name' => 'MoonShine',
                'slug' => 'moonshine/app',
                'namespace' => 'moonshine-software/app',
                'repo_url' => 'https://github.com/moonshine-software/app',
                'tags' => ['PHP'],
                'is_official' => false,
            ],
            [
                'name' => 'New Laravel React App',
                'slug' => 'tnylea/react-starter',
                'namespace' => 'tnylea/react-starter',
                'repo_url' => 'https://github.com/tnylea/react-starter',
                'tags' => ['JavaScript', 'Tailwind CSS', 'PHP', 'Inertia.js', 'React'],
                'is_official' => false,
            ],
            [
                'name' => 'New Laravel Inertia+React App',
                'slug' => 'tnylea/react-inertia-starter',
                'namespace' => 'tnylea/react-inertia-starter',
                'repo_url' => 'https://github.com/tnylea/react-inertia-starter',
                'tags' => ['JavaScript', 'Tailwind CSS', 'PHP', 'Inertia.js', 'React'],
                'is_official' => false,
            ],
            [
                'name' => 'Bootstrap Starter Kit',
                'slug' => 'hostmoz/laravel-bootstrap-starter-kit',
                'namespace' => 'hostmoz/laravel-bootstrap-starter-kit',
                'repo_url' => 'https://github.com/hostmoz/laravel-bootstrap-starter-kit',
                'tags' => ['PHP', 'Bootstrap', 'Blade'],
                'is_official' => false,
            ],
            [
                'name' => 'Blade Starter Kit (with FluxUI)',
                'slug' => 'imacrayon/blade-starter-kit',
                'namespace' => 'imacrayon/blade-starter-kit',
                'repo_url' => 'https://github.com/imacrayon/blade-starter-kit',
                'tags' => ['PHP', 'Tailwind CSS', 'Blade'],
                'is_official' => false,
            ],
            [
                'name' => 'React (Mantine) Starter Kit',
                'slug' => 'adrum/laravel-react-mantine-starter-kit',
                'namespace' => 'adrum/laravel-react-mantine-starter-kit',
                'repo_url' => 'https://github.com/adrum/laravel-react-mantine-starter-kit',
                'tags' => ['JavaScript', 'Tailwind CSS', 'PHP', 'Inertia.js', 'React'],
                'is_official' => false,
            ],
            [
                'name' => 'Jetstream React (TypeScript)',
                'slug' => 'adrum/laravel-jetstream-react-typescript',
                'namespace' => 'adrum/laravel-jetstream-react-typescript',
                'repo_url' => 'https://github.com/adrum/laravel-jetstream-react-typescript',
                'tags' => ['JavaScript', 'Tailwind CSS', 'PHP', 'Inertia.js', 'React'],
                'is_official' => false,
            ],
            [
                'name' => 'Laravel Breeze React Starter Kit',
                'slug' => 'luis-developer-08/breeze-react-jsx-starter-kit',
                'namespace' => 'luis-developer-08/breeze-react-jsx-starter-kit',
                'repo_url' => 'https://github.com/luis-developer-08/breeze-react-jsx-starter-kit',
                'tags' => ['JavaScript', 'Tailwind CSS', 'PHP', 'Inertia.js', 'React'],
                'is_official' => false,
            ],
            [
                'name' => 'Justd Starter Kit',
                'slug' => 'justd/laravel',
                'namespace' => 'justdlabs/laravel',
                'repo_url' => 'https://github.com/justdlabs/laravel',
                'tags' => ['PHP'],
                'is_official' => false,
            ],
            [
                'name' => 'CoreUI Vue Starter Kit',
                'slug' => 'kastsecho/coreui-vue-starter-kit',
                'namespace' => 'kastsecho/coreui-vue-starter-kit',
                'repo_url' => 'https://github.com/kastsecho/coreui-vue-starter-kit',
                'tags' => ['JavaScript', 'Tailwind CSS', 'PHP', 'Vue.js', 'Inertia.js'],
                'is_official' => false,
            ],
            [
                'name' => 'Tabler based Laravel starter kit',
                'slug' => 'santosvilanculos/cuirass',
                'namespace' => 'santosvilanculos/cuirass',
                'repo_url' => 'https://github.com/santosvilanculos/cuirass',
                'tags' => ['PHP'],
                'is_official' => false,
            ],
            [
                'name' => 'Hotwire Starter Kit',
                'slug' => 'hotwired-laravel/hotwire-starter-kit',
                'namespace' => 'hotwired-laravel/hotwire-starter-kit',
                'repo_url' => 'https://github.com/hotwired-laravel/hotwire-starter-kit',
                'tags' => ['PHP', 'Stimulus.js', 'Hotwire', 'Blade'],
                'is_official' => false,
            ],
        ];

        foreach ($kits as $kit) {
            $kitModel = Kit::firstOrCreate([
                'slug' => $kit['slug'],
            ], [
                'name' => $kit['name'],
                'namespace' => $kit['namespace'],
                'repo_url' => $kit['repo_url'],
                'is_official' => $kit['is_official'],
            ]);

            foreach ($kit['tags'] as $tag) {
                $tagModel = Tag::firstOrCreate(['name' => $tag]);
                $kitModel->tags()->syncWithoutDetaching($tagModel);
            }
        }
    }
};

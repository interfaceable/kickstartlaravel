<?php

declare(strict_types=1);

namespace App\Providers;

use App\Enums\Role;
use App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();
        Model::shouldBeStrict(! app()->isProduction());

        Relation::enforceMorphMap([
            'tag' => Models\Tag::class,
            'kit' => Models\Kit::class,
            'user' => Models\User::class,
        ]);

        Gate::after(fn (Models\User $user, mixed $ability) => $user->hasRole(Role::SUPER_ADMIN));
    }
}

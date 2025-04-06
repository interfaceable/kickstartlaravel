<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesAndPermissionsSeeder::class);

        User::factory()
            ->withRoles(Role::SUPER_ADMIN)
            ->state([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
            ])
            ->create();

        User::factory(2)
            ->withRoles(Role::ADMIN)
            ->create();

        User::factory()
            ->withRoles(Role::CONTRIBUTOR)
            ->state([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ])
            ->create();

        User::factory(10)
            ->withRoles(Role::CONTRIBUTOR)
            ->create();

        $this->call(TagSeeder::class);
        $this->call(KitSeeder::class);
    }
}

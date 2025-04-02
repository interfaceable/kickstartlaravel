<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Kit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KitSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kit::factory(100)->create();
    }
}

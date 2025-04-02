<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Livewire as LivewireComponents;

Route::get('/', LivewireComponents\KitsList::class);

<?php

declare(strict_types=1);

use App\Livewire as LivewireComponents;
use Illuminate\Support\Facades\Route;

Route::get('/', LivewireComponents\KitsList::class);

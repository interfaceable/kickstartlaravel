<?php

declare(strict_types=1);

namespace App\Filament\Resources\KitResource\Pages;

use App\Filament\Resources\KitResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKits extends ListRecords
{
    protected static string $resource = KitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->slideOver(),
        ];
    }
}

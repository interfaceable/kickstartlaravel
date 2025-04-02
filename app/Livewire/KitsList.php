<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Kit;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Filters;

class KitsList extends Component implements HasTable, HasForms
{
    use InteractsWithTable,
        InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Kit::query())
            ->columns([
                Tables\Columns\Layout\Stack::make([
                    Tables\Columns\TextColumn::make('name')
                        ->searchable()
                        ->weight(FontWeight::Bold),

                    Tables\Columns\TextColumn::make('namespace')
                        ->color('gray')
                        ->limit(30),
                ]),
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            ->paginated([
                18,
                36,
                72,
                'all',
            ])
            ->filters([
                Filters\SelectFilter::make('tags')
                    ->relationship('tags', 'name')
                    ->multiple()
                    ->preload()
                    ->placeholder(__('Tech stack, author etc...'))
                    ->label(__('Tags'))
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\Action::make('visit')
                    ->label(__('Visit'))
                    ->icon('heroicon-m-arrow-top-right-on-square')
                    ->color('gray')
                    ->url(url: fn (Kit $kit): string => $kit->repo_url, shouldOpenInNewTab: true),

                Tables\Actions\Action::make('install')
                    ->label(__('Install'))
                    ->icon('heroicon-m-arrow-down-tray')
                    ->action(function ($livewire, Kit $kit) {
                        $livewire->js(
                            'window.navigator.clipboard.writeText("laravel new myapp --using='.$kit->namespace.'");
                            $tooltip("'.__('Copied to clipboard').'", { timeout: 1500 });'
                        );
                    })
            ]);
    }
}

<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Kit;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters;
use Filament\Tables\Table;
use Livewire\Component;

class KitsList extends Component implements HasForms, HasTable
{
    use InteractsWithForms,
        InteractsWithTable;

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
                    ->label(__('Install with CLI'))
                    ->icon('heroicon-o-command-line')
                    ->requiresConfirmation()
                    ->modalIcon('heroicon-o-command-line')
                    ->modalHeading(__('Generate install command'))
                    ->modalDescription(__('Enter the name of your new project and click "Copy" to copy the command to your clipboard.'))
                    ->form([
                        Forms\Components\TextInput::make('name')
                            ->label(__('Project name'))
                            ->placeholder('myapp')
                            ->required()
                            ->string()
                            ->maxLength(255)
                            ->default('myapp'),
                    ])
                    ->modalWidth('md')
                    ->modalSubmitActionLabel(__('Copy'))
                    ->action(function ($livewire, Kit $kit, array $data) {
                        $livewire->js('window.navigator.clipboard.writeText("laravel new '.$data['name'].' --using='.$kit->namespace.'");');

                        Notification::make()
                            ->title(__('Command copied to clipboard'))
                            ->success()
                            ->send();
                    }),
                Tables\Actions\Action::make('install-with-herd')
                    ->hiddenLabel()
                    ->icon(fn () => view('components.install-with-herd'))
                    ->url(fn (Kit $kit): string => sprintf('https://herd.laravel.com/new?starter-kit=%s', $kit->namespace)),
            ]);
    }
}

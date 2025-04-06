<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\KitResource\Pages;
use App\Models\Kit;
use Exception;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KitResource extends Resource
{
    protected static ?string $model = Kit::class;

    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('Name'))
                    ->required()
                    ->string()
                    ->maxLength(255),

                Forms\Components\TextInput::make('slug')
                    ->label(__('Slug'))
                    ->required()
                    ->string()
                    ->unique(
                        table: 'kits',
                        column: 'slug',
                        ignoreRecord: true
                    ),

                Forms\Components\TextInput::make('namespace')
                    ->label(__('Namespace'))
                    ->required()
                    ->string()
                    ->unique(
                        table: 'kits',
                        column: 'slug',
                        ignoreRecord: true
                    ),

                Forms\Components\TextInput::make('repo_url')
                    ->label(__('Repository URL'))
                    ->required()
                    ->url(),

                Forms\Components\Checkbox::make('is_official')
                    ->label(__('Official')),

                Forms\Components\MarkdownEditor::make('description')
                    ->columnSpanFull()
                    ->nullable(),
            ]);
    }

    /**
     * @throws Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Name'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->label(__('Slug'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('namespace')
                    ->label(__('Namespace'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('repo_url')
                    ->label(__('Repository URL'))
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('Updated At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('deleted_at')
                    ->label(__('Deleted At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                        ->label(__('View')),
                    Tables\Actions\EditAction::make()
                        ->label(__('Edit'))
                        ->slideOver(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKits::route('/'),
            'view' => Pages\ViewKit::route('/{record}'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}

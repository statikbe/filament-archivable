<?php

namespace Statik\FilamentArchivable\Tests\TestResources;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Statik\FilamentArchivable\Actions\ArchiveAction;
use Statik\FilamentArchivable\Actions\UnArchiveAction;
use Statik\FilamentArchivable\Tables\Filters\ArchivedFilter;
use Statik\FilamentArchivable\Tests\TestModels\ModelWithArchivableTrait;
use Statik\FilamentArchivable\Tests\TestResources\ModelWithArchivableTraitAndCustomClassesResource\Pages\ListPage;

class ModelWithArchivableTraitAndCustomClassesResource extends Resource
{
    protected static ?string $model = ModelWithArchivableTrait::class;

    public static ?string $modelLabel = 'with-classes';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name'),
                DatePicker::make('archived_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('archived_at')
                    ->dateTime(),
            ])
            ->filters([
                ArchivedFilter::make(),
            ])
            ->recordActions([
                ArchiveAction::make(),
                UnArchiveAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPage::route('/'),
        ];
    }
}

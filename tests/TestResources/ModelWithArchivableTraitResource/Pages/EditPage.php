<?php

namespace Statik\FilamentArchivable\Tests\TestResources\ModelWithArchivableTraitResource\Pages;

use Filament\Resources\Pages\EditRecord;
use Statik\FilamentArchivable\Actions\ArchiveAction;
use Statik\FilamentArchivable\Actions\UnArchiveAction;
use Statik\FilamentArchivable\Tests\TestResources\ModelWithArchivableTraitResource;

class EditPage extends EditRecord
{
    protected static string $resource = ModelWithArchivableTraitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ArchiveAction::make(),
            UnArchiveAction::make(),
        ];
    }
}

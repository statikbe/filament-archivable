<?php

namespace Statik\FilamentArchivable\Tests\TestResources\ModelWithArchivableTraitAndFalseCustomClassesResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Statik\FilamentArchivable\Tests\TestResources\ModelWithArchivableTraitAndFalseCustomClassesResource;

class ListPage extends ListRecords
{
    protected static string $resource = ModelWithArchivableTraitAndFalseCustomClassesResource::class;
}

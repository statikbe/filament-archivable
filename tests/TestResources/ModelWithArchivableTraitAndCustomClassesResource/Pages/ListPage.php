<?php

namespace Statik\FilamentArchivable\Tests\TestResources\ModelWithArchivableTraitAndCustomClassesResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Statik\FilamentArchivable\Tests\TestResources\ModelWithArchivableTraitAndCustomClassesResource;

class ListPage extends ListRecords
{
    protected static string $resource = ModelWithArchivableTraitAndCustomClassesResource::class;
}

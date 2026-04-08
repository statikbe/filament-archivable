<?php

namespace Statik\FilamentArchivable\Tests\TestResources\ModelWithArchivableTraitResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Statik\FilamentArchivable\Tests\TestResources\ModelWithArchivableTraitResource;

class ListPage extends ListRecords
{
    protected static string $resource = ModelWithArchivableTraitResource::class;
}

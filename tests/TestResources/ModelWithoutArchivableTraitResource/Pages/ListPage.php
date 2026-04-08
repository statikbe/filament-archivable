<?php

namespace Statik\FilamentArchivable\Tests\TestResources\ModelWithoutArchivableTraitResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Statik\FilamentArchivable\Tests\TestResources\ModelWithoutArchivableTraitResource;

class ListPage extends ListRecords
{
    protected static string $resource = ModelWithoutArchivableTraitResource::class;
}

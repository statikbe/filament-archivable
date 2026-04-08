<?php

namespace Statik\FilamentArchivable\Tests\TestModels;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Statik\FilamentArchivable\Tests\TestFactories\ModelWithoutArchivableTraitFactory;

class ModelWithoutArchivableTrait extends Model
{
    use HasFactory;

    protected $table = 'without';

    protected static function newFactory(): Factory
    {
        return ModelWithoutArchivableTraitFactory::new();
    }
}

<?php

namespace Statik\FilamentArchivable;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use LaravelArchivable\Archivable;

class FilamentArchivablePlugin implements Plugin
{
    protected string|array $archivedRecordClasses = 'opacity-25';

    public function getId(): string
    {
        return 'filament-archivable';
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }

    public function archivedRecordClasses(string|array $classes): static
    {
        $this->archivedRecordClasses = $classes;

        return $this;
    }

    public function register(Panel $panel): void
    {
        //
    }

    public function boot(Panel $panel): void
    {
        $classes = $this->archivedRecordClasses;

        Table::configureUsing(function (Table $table) use ($classes): void {
            $table->recordClasses(function (Model $record) use ($classes): string|array|null {
                if (! in_array(Archivable::class, class_uses_recursive($record))) {
                    return null;
                }

                return $record->isArchived() ? $classes : null;
            });
        });
    }
}

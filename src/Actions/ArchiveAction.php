<?php

namespace Statik\FilamentArchivable\Actions;

use Filament\Actions\Action;
use Filament\Actions\Concerns\CanCustomizeProcess;
use Illuminate\Database\Eloquent\Model;

class ArchiveAction extends Action
{
    use CanCustomizeProcess;

    public static function getDefaultName(): ?string
    {
        return 'archive';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->label(__('filament-archivable::actions.archive.single.label'));

        $this->modalHeading(fn (): string => __('filament-archivable::actions.archive.single.modal.heading', ['label' => $this->getRecordTitle()]));

        $this->modalSubmitActionLabel(__('filament-archivable::actions.archive.single.modal.actions.archive.label'));

        $this->successNotificationTitle(__('filament-archivable::actions.archive.single.notifications.archived.title'));

        $this->color('warning');

        $this->icon('heroicon-o-archive-box');

        $this->requiresConfirmation();

        $this->hidden(static function (Model $record): bool {
            if (! method_exists($record, 'isArchived')) {
                return false;
            }

            return $record->isArchived();
        });

        $this->action(function (): void {
            $result = $this->process(static fn (Model $record) => $record->archive());

            if (! $result) {
                $this->failure();

                return;
            }

            $this->success();
        });
    }
}

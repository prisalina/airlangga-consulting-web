<?php

namespace App\Filament\Resources\ContactResource\Pages;

use App\Filament\Resources\ContactResource;
use Filament\Resources\Pages\ViewRecord;

class ViewContact extends ViewRecord
{
    protected static string $resource = ContactResource::class;

    protected function afterFill(): void
    {
        if (! $this->record->is_read) {
            $this->record->markAsRead();
        }
    }
}

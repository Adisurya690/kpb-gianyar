<?php

namespace App\Filament\Resources\InternalResource\Pages;

use App\Filament\Resources\InternalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInternal extends EditRecord
{
    protected static string $resource = InternalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\KebudayaanResource\Pages;

use App\Filament\Resources\KebudayaanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKebudayaan extends EditRecord
{
    protected static string $resource = KebudayaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

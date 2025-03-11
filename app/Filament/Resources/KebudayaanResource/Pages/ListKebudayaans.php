<?php

namespace App\Filament\Resources\KebudayaanResource\Pages;

use App\Filament\Resources\KebudayaanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKebudayaans extends ListRecords
{
    protected static string $resource = KebudayaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

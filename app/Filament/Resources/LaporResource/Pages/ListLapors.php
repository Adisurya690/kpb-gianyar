<?php

namespace App\Filament\Resources\LaporResource\Pages;

use App\Filament\Resources\LaporResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLapors extends ListRecords
{
    protected static string $resource = LaporResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make(),
    //     ];
    // }
    
}

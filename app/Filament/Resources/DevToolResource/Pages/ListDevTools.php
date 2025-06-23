<?php

namespace App\Filament\Resources\DevToolResource\Pages;

use App\Filament\Resources\DevToolResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDevTools extends ListRecords
{
    protected static string $resource = DevToolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

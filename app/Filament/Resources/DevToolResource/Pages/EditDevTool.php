<?php

namespace App\Filament\Resources\DevToolResource\Pages;

use App\Filament\Resources\DevToolResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDevTool extends EditRecord
{
    protected static string $resource = DevToolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

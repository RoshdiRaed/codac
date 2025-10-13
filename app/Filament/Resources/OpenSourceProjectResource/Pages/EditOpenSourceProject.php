<?php

namespace App\Filament\Resources\OpenSourceProjectResource\Pages;

use App\Filament\Resources\OpenSourceProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOpenSourceProject extends EditRecord
{
    protected static string $resource = OpenSourceProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

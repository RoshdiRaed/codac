<?php

namespace App\Filament\Resources\AdvancedTechniqueResource\Pages;

use App\Filament\Resources\AdvancedTechniqueResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;

class EditAdvancedTechnique extends EditRecord
{
    protected static string $resource = AdvancedTechniqueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(), 
        ];
    }
}

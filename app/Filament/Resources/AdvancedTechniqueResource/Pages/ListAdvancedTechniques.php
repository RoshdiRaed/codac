<?php

namespace App\Filament\Resources\AdvancedTechniqueResource\Pages;

use App\Filament\Resources\AdvancedTechniqueResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdvancedTechniques extends ListRecords
{
    protected static string $resource = AdvancedTechniqueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\OpenSourceProjectResource\Pages;

use App\Filament\Resources\OpenSourceProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOpenSourceProjects extends ListRecords
{
    protected static string $resource = OpenSourceProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

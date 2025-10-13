<?php

namespace App\Filament\Resources\SubTrackResource\Pages;

use App\Filament\Resources\SubTrackResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubTrack extends EditRecord
{
    protected static string $resource = SubTrackResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

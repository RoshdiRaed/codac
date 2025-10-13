<?php

namespace App\Filament\Resources\TipResource\Pages;

use App\Filament\Resources\TipResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Components\FileUpload;


class CreateTip extends CreateRecord
{
    protected static string $resource = TipResource::class;

    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('image')
                ->image()
                ->imageEditor()
                ->directory('tips')
                ->columnSpanFull(),
        ];
    }
}
// {
// }

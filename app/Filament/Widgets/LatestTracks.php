<?php

namespace App\Filament\Widgets;

use App\Models\Track;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class LatestTracks extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    protected function getTableQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return Track::query()->latest()->limit(5);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('title')
                ->label('اسم المسار')
                ->searchable()
                ->sortable()
                ->description(fn (Track $record): string => $record->description ?? '')
                ->limit(50)
                ->icon('heroicon-o-musical-note')
                ->iconColor('success')
                ->weight('bold')
                ->copyable()
                ->copyMessage('✨ تم النسخ بنجاح!')
                ->copyMessageDuration(1500)
                ->extraAttributes([
                    'class' => 'transform transition-all duration-700 ease-in-out hover:scale-105 hover:text-emerald-600 hover:shadow-xl hover:-translate-y-1 cursor-pointer',
                ]),

            TextColumn::make('category')
                ->label('التصنيف')
                ->sortable()
                ->badge()
                ->color(fn () => ['primary', 'success', 'warning', 'danger'][array_rand([0,1,2,3])])
                ->icon('heroicon-o-bookmark')
                ->extraAttributes([
                    'class' => 'animate-pulse hover:animate-bounce transition-all duration-500 hover:shadow-md hover:scale-110',
                ]),

            TextColumn::make('created_at')
                ->label('تمت الإضافة')
                ->since()
                ->sortable()
                ->tooltip(fn (Track $record): string => $record->created_at->format('Y-m-d H:i:s'))
                ->icon('heroicon-o-calendar')
                ->iconColor('primary')
                ->extraAttributes([
                    'class' => 'transition-all duration-500 hover:scale-105 hover:font-bold hover:text-blue-600 hover:rotate-2',
                ]),

            TextColumn::make('updated_at')
                ->label('آخر تحديث')
                ->since()
                ->sortable()
                ->color('info')
                ->icon('heroicon-o-clock')
                ->iconColor('warning')
                ->extraAttributes([
                    'class' => 'group transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl',
                ]),
        ];
    }

}

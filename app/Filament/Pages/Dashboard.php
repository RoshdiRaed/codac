<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.pages.dashboard';
    protected static ?string $title = 'لوحة التحكم';
    protected static ?int $navigationSort = -1;

    public function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Widgets\StatsOverview::class,
            \App\Filament\Widgets\TracksChart::class,
            \App\Filament\Widgets\LatestTracks::class,
        ];
    }

    public function getHeaderWidgetsColumns(): int
    {
        return 3;
    }
}

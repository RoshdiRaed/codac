<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Track;
use App\Models\SubTrack;

class StatsOverview extends BaseWidget
{
    public function getStats(): array
    {
        return [
            Stat::make('عدد المسارات', Track::count())
            ->description('إجمالي المسارات المتاحة')
            ->icon('heroicon-m-rectangle-stack')
            ->color('primary')
            ->chart([7, 3, 4, 5, 6, 3, 5])
            ->extraAttributes([
                'class' => 'ring-2 ring-primary-500/50',
            ])
            ->descriptionIcon('heroicon-m-arrow-trending-up'),

            Stat::make('عدد الوحدات الفرعية', SubTrack::count())
            ->description('تفصيلات المسارات')
            ->icon('heroicon-m-squares-2x2')
            ->color('success')
            ->chart([3, 5, 7, 8, 6, 9, 8])
            ->extraAttributes([
                'class' => 'ring-2 ring-success-500/50',
            ])
            ->descriptionIcon('heroicon-m-arrow-trending-up'),

            Stat::make('نسبة الإكتمال', '85%')
            ->description('معدل إكتمال المحتوى')
            ->icon('heroicon-m-check-circle')
            ->color('warning')
            ->chart([4, 5, 6, 7, 8, 8, 8.5])
            ->extraAttributes([
                'class' => 'ring-2 ring-warning-500/50',
            ]),

            Stat::make('المستخدمين النشطين', '120')
            ->description('في آخر 7 أيام')
            ->icon('heroicon-m-users')
            ->color('info')
            ->chart([12, 15, 18, 14, 11, 16, 20])
            ->extraAttributes([
                'class' => 'ring-2 ring-info-500/50',
            ]),
        ];

    }

}

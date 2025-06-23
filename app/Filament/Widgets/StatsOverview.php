<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Support\Colors\Color;
use App\Models\OpenSourceProject;
use App\Models\Tip;
use App\Models\Track;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
{
    return [
        Stat::make('📁 عدد المشاريع', OpenSourceProject::count())
        ->icon('heroicon-o-code-bracket')
        ->color(Color::Blue)
        ->description('المشاريع المفتوحة المصدر')
        ->descriptionIcon('heroicon-o-arrow-trending-up')
        ->chart([7, 4, 6, 8, 10])
        ->extraAttributes([
            'title' => 'إجمالي المشاريع العامة التي يمكن المساهمة بها',
            'class' => 'cursor-pointer transition hover:scale-[1.02]',
            'wire:click' => '$dispatch("open-projects")',
        ]),

        Stat::make('💡 عدد النصائح', Tip::count())
            ->icon('heroicon-o-light-bulb')
            ->color(Color::Green)
            ->description('نصائح وتقنيات للمطورين')
            ->descriptionIcon('heroicon-o-sparkles')
            ->chart([3, 5, 7, 8, 12])
            ->extraAttributes([
                'class' => 'cursor-pointer transition hover:scale-[1.02]',
                'wire:click' => '$dispatch("open-tips")',
            ]),
            // ->tooltip('النصائح التقنية المنشورة على الموقع'),

        Stat::make('🗺️ عدد المسارات', Track::count())
            ->icon('heroicon-o-map')
            ->color(Color::Teal)
            ->description('مسارات تعلم منظمة')
            ->descriptionIcon('heroicon-o-academic-cap')
            ->chart([2, 4, 6, 8, 10])
            ->extraAttributes([
                'class' => 'cursor-pointer transition hover:scale-[1.02]',
                'wire:click' => '$dispatch("open-tracks")',
            ])
            // ->tooltip('عدد المسارات التعليمية المتاحة حالياً'),
    ];
}
}

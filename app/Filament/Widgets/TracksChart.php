<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Track;

class TracksChart extends ChartWidget
{

    protected static ?string $heading = 'عدد الوحدات في كل مسار';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $labels = Track::pluck('title');
        $data = Track::withCount('subTracks')->get()->pluck('sub_tracks_count');

        return [
            'datasets' => [
                [
                    'label' => 'عدد الوحدات',
                    'data' => $data,
                    'backgroundColor' => '#00ADB5',
                ],
            ],
            'labels' => $labels,
            'scales' => [
                'y' => [
                    'ticks' => [
                        'font' => [
                            'family' => 'Cairo',
                            'size' => 14
                        ]
                    ]
                ],
                'x' => [
                    'ticks' => [
                        'font' => [
                            'family' => 'Cairo',
                            'size' => 14
                        ]
                    ]
                ]
            ],
            'plugins' => [
                'legend' => [
                    'labels' => [
                        'font' => [
                            'family' => 'Cairo',
                            'size' => 14
                        ]
                    ]
                ]
            ]
        ];

    }

    protected function getType(): string
    {
        return 'bar'; // أو 'pie' أو 'line'
    }
}

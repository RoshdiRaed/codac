<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Track;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class TracksChart extends ChartWidget
{
    protected static ?string $heading = 'إحصائيات المسارات التعليمية';
    protected static ?int $sort = 2;
    protected static ?string $maxHeight = '400px';

    // Chart configuration constants
    private const CACHE_KEY = 'tracks_chart_data';
    private const CACHE_TTL = 300; // 5 minutes
    private const COLOR_PALETTE = [
        'primary' => '#00ADB5',
        'secondary' => '#008891',
        'accent' => '#00CCDD',
        'success' => '#00E676',
        'warning' => '#FFB300',
        'error' => '#FF5252',
        'surface' => '#F5F5F5',
        'gradient_start' => '#00ADB5',
        'gradient_end' => '#008891'
    ];

    protected function getData(): array
    {
        return Cache::remember(self::CACHE_KEY, self::CACHE_TTL, function () {
            return $this->buildChartData();
        });
    }

    private function buildChartData(): array
    {
        $tracks = $this->getTracksWithMetrics();

        if ($tracks->isEmpty()) {
            return $this->getEmptyStateData();
        }

        return [
            'datasets' => $this->buildDatasets($tracks),
            'labels' => $this->formatLabels($tracks),
            'options' => $this->getChartOptions(),
        ];
    }

    private function getTracksWithMetrics(): Collection
    {
        return Track::query()
            ->withCount(['subTracks', 'enrollments', 'completedEnrollments'])
            ->withAvg('reviews', 'rating')
            ->when(request()->has('date_range'), function ($query) {
                return $query->whereBetween('created_at', [
                    Carbon::parse(request('date_range.start')),
                    Carbon::parse(request('date_range.end'))
                ]);
            })
            ->orderByDesc('sub_tracks_count')
            ->get()
            ->map(function ($track) {
                return [
                    'id' => $track->id,
                    'title' => $track->title,
                    'sub_tracks_count' => $track->sub_tracks_count ?? 0,
                    'enrollments_count' => $track->enrollments_count ?? 0,
                    'completion_rate' => $this->calculateCompletionRate($track),
                    'rating' => round($track->reviews_avg_rating ?? 0, 1),
                    'popularity_score' => $this->calculatePopularityScore($track),
                ];
            });
    }

    private function calculateCompletionRate($track): float
    {
        $total = $track->enrollments_count ?? 0;
        $completed = $track->completed_enrollments_count ?? 0;

        return $total > 0 ? round(($completed / $total) * 100, 1) : 0;
    }

    private function calculatePopularityScore($track): float
    {
        $enrollments = $track->enrollments_count ?? 0;
        $rating = $track->reviews_avg_rating ?? 0;
        $subTracks = $track->sub_tracks_count ?? 0;

        return round(($enrollments * 0.5) + ($rating * 0.3) + ($subTracks * 0.2), 2);
    }

    private function buildDatasets(Collection $tracks): array
    {
        $maxValue = $tracks->max('sub_tracks_count');

        return [
            [
                'label' => 'عدد الوحدات',
                'data' => $tracks->pluck('sub_tracks_count')->toArray(),
                'backgroundColor' => $this->generateGradientColors($tracks, $maxValue),
                'borderColor' => self::COLOR_PALETTE['primary'],
                'borderWidth' => 2,
                'borderRadius' => 8,
                'borderSkipped' => false,
                'hoverBackgroundColor' => $this->generateHoverColors($tracks),
                'hoverBorderColor' => self::COLOR_PALETTE['accent'],
                'hoverBorderWidth' => 3,
                'hoverBorderRadius' => 12,
                'metadata' => [
                    'enrollments' => $tracks->pluck('enrollments_count')->toArray(),
                    'completion_rates' => $tracks->pluck('completion_rate')->toArray(),
                    'ratings' => $tracks->pluck('rating')->toArray(),
                    'popularity_scores' => $tracks->pluck('popularity_score')->toArray(),
                ],
            ],
        ];
    }

    private function generateGradientColors(Collection $tracks, int $maxValue): array
    {
        return $tracks->map(function ($track) use ($maxValue) {
            $intensity = $maxValue > 0 ? ($track['sub_tracks_count'] / $maxValue) : 0;
            $alpha = 0.6 + ($intensity * 0.4); // Dynamic opacity

            // Generate color based on performance metrics
            $hue = $this->calculateColorHue($track);

            return "hsla({$hue}, 70%, 60%, {$alpha})";
        })->toArray();
    }

    private function calculateColorHue(array $track): int
    {
        $completionRate = $track['completion_rate'];
        $rating = $track['rating'];

        // Green for high performance, red for low performance
        $performanceScore = ($completionRate + ($rating * 20)) / 2;

        return (int) (120 * ($performanceScore / 100)); // 0-120 degrees (red to green)
    }

    private function generateHoverColors(Collection $tracks): array
    {
        return $tracks->map(function () {
            return self::COLOR_PALETTE['accent'];
        })->toArray();
    }

    private function formatLabels(Collection $tracks): array
    {
        return $tracks->map(function ($track) {
            $title = mb_strlen($track['title']) > 15
                ? mb_substr($track['title'], 0, 15) . '...'
                : $track['title'];

            return $title . " ({$track['sub_tracks_count']})";
        })->toArray();
    }

    private function getChartOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'interaction' => [
                'intersect' => false,
                'mode' => 'index',
            ],
            'animation' => [
                'duration' => 1000,
                'easing' => 'easeInOutQuart',
            ],
            'scales' => $this->getScalesConfiguration(),
            'plugins' => $this->getPluginsConfiguration(),
            'elements' => [
                'bar' => [
                    'borderRadius' => 8,
                    'borderSkipped' => false,
                ],
            ],
        ];
    }

    private function getScalesConfiguration(): array
    {
        return [
            'y' => [
                'beginAtZero' => true,
                'grid' => [
                    'drawBorder' => false,
                    'color' => 'rgba(0, 173, 181, 0.08)',
                    'lineWidth' => 1,
                ],
                'ticks' => [
                    'font' => [
                        'family' => 'Cairo, sans-serif',
                        'size' => 12,
                        'weight' => '500',
                    ],
                    'color' => '#64748B',
                    'stepSize' => 1,
                    'padding' => 8,
                ],
                'title' => [
                    'display' => true,
                    'text' => 'عدد الوحدات',
                    'font' => [
                        'family' => 'Cairo, sans-serif',
                        'size' => 14,
                        'weight' => '600',
                    ],
                    'color' => '#475569',
                ],
            ],
            'x' => [
                'grid' => [
                    'display' => false,
                ],
                'ticks' => [
                    'font' => [
                        'family' => 'Cairo, sans-serif',
                        'size' => 11,
                        'weight' => '500',
                    ],
                    'color' => '#64748B',
                    'maxRotation' => 45,
                    'minRotation' => 0,
                    'padding' => 8,
                ],
            ],
        ];
    }

    private function getPluginsConfiguration(): array
    {
        return [
            'legend' => [
                'display' => true,
                'position' => 'top',
                'align' => 'center',
                'labels' => [
                    'font' => [
                        'family' => 'Cairo, sans-serif',
                        'size' => 13,
                        'weight' => '600',
                    ],
                    'color' => '#334155',
                    'padding' => 20,
                    'usePointStyle' => true,
                    'pointStyle' => 'rectRounded',
                ],
            ],
            'tooltip' => [
                'enabled' => true,
                'backgroundColor' => 'rgba(15, 23, 42, 0.95)',
                'titleColor' => '#F1F5F9',
                'bodyColor' => '#CBD5E1',
                'borderColor' => self::COLOR_PALETTE['primary'],
                'borderWidth' => 1,
                'padding' => 16,
                'cornerRadius' => 12,
                'titleSpacing' => 8,
                'bodySpacing' => 8,
                'caretSize' => 8,
                'displayColors' => true,
                'callbacks' => [
                    'title' => "function(context) {
                        return context[0].label.split(' (')[0];
                    }",
                    'afterBody' => "function(context) {
                        const dataIndex = context[0].dataIndex;
                        const metadata = context[0].dataset.metadata;
                        return [
                            '',
                            '📊 إجمالي التسجيلات: ' + metadata.enrollments[dataIndex],
                            '✅ معدل الإكمال: ' + metadata.completion_rates[dataIndex] + '%',
                            '⭐ التقييم: ' + metadata.ratings[dataIndex] + '/5',
                            '🔥 درجة الشعبية: ' + metadata.popularity_scores[dataIndex]
                        ];
                    }",
                ],
                'titleFont' => [
                    'family' => 'Cairo, sans-serif',
                    'size' => 14,
                    'weight' => '600',
                ],
                'bodyFont' => [
                    'family' => 'Cairo, sans-serif',
                    'size' => 12,
                    'weight' => '400',
                ],
            ],
            'datalabels' => [
                'display' => true,
                'anchor' => 'end',
                'align' => 'top',
                'font' => [
                    'family' => 'Cairo, sans-serif',
                    'size' => 11,
                    'weight' => '600',
                ],
                'color' => '#475569',
                'offset' => 4,
                'formatter' => "function(value, context) {
                    return value > 0 ? value : '';
                }",
            ],
        ];
    }

    private function getEmptyStateData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'لا توجد بيانات',
                    'data' => [],
                    'backgroundColor' => [],
                ],
            ],
            'labels' => [],
            'options' => [
                'plugins' => [
                    'legend' => ['display' => false],
                    'tooltip' => ['enabled' => false],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                ],
            ],
        ];
    }

    public function getDescription(): ?string
    {
        return 'عرض إحصائيات شاملة للمسارات التعليمية مع معدلات الإكمال والتقييمات';
    }

    // Performance optimization methods
    public static function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY);
    }

    protected function getPollingInterval(): ?string
    {
        return '30s'; // Auto-refresh every 30 seconds
    }
}

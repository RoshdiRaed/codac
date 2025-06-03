<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;
use Filament\Forms\Components\Section;

class AdvancedSettings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static string $view = 'filament.pages.advanced-settings';
    protected static ?string $navigationGroup = 'Settings';

    public function getVisitorCount(): int
    {
        return DB::table('page_views')->count(); // أو أي جدول موجود فعلاً
    }


    protected function getFormSchema(): array
    {
        $homeViews = DB::table('page_views')->where('page', 'home')->count();

        return [
            Section::make()
                ->schema([
                    \Filament\Forms\Components\Placeholder::make('home_views')
                        ->label('عدد زوار الصفحة الرئيسية')
                        ->content("{$homeViews} زيارة"),
                ])
                ->columns(1),
            // أي إعدادات أخرى موجودة عندك هنا...
        ];
    }
}

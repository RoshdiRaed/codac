<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\DB;

class AdvancedSettings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $view = 'filament.pages.advanced-settings';

    protected static ?string $navigationGroup = 'الإعدادات';

    protected static ?string $navigationLabel = 'الإعدادات المتقدمة';

    protected static ?string $title = 'الإعدادات المتقدمة';

    protected static ?string $slug = 'advanced-settings';

    public static function getNavigationBadge(): ?string
    {
        return DB::table('page_views')->count() > 0 ? number_format(DB::table('page_views')->count()) : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        $count = DB::table('page_views')->count();
        return $count < 100 ? 'danger' : ($count <= 500 ? 'warning' : 'success');
    }

    /**
     * استرجاع عدد زوار جميع الصفحات.
     *
     * @return int
     */
    public function getVisitorCount(): int
    {
        return DB::table('page_views')->count();
    }

    /**
     * تحديد مخطط النموذج لعرض الإعدادات والإحصائيات.
     *
     * @return array
     */
    protected function getFormSchema(): array
    {
        $homeViews = DB::table('page_views')->where('page', 'home')->count();
        $aboutViews = DB::table('page_views')->where('page', 'about')->count();
        $totalViews = $this->getVisitorCount();

        return [
            Section::make('إحصائيات الزوار')
                ->description('عرض إحصائيات زيارات الصفحات')
                ->icon('heroicon-o-chart-bar')
                ->collapsible()
                ->schema([
                    Placeholder::make('total_views')
                        ->label('إجمالي الزيارات')
                        ->content(number_format($totalViews) . ' زيارة')
                        ->helperText('إجمالي عدد الزيارات لجميع الصفحات'),

                    Placeholder::make('home_views')
                        ->label('زيارات الصفحة الرئيسية')
                        ->content(number_format($homeViews) . ' زيارة')
                        ->helperText('عدد الزيارات للصفحة الرئيسية فقط'),

                    Placeholder::make('about_views')
                        ->label('زيارات صفحة "من نحن"')
                        ->content(number_format($aboutViews) . ' زيارة')
                        ->helperText('عدد الزيارات لصفحة "من نحن"'),
                ])
                ->columns(2),

            Section::make('إعدادات النظام')
                ->description('إدارة إعدادات النظام المتقدمة')
                ->icon('heroicon-o-cog-6-tooth')
                ->collapsible()
                ->schema([
                    Toggle::make('maintenance_mode')
                        ->label('وضع الصيانة')
                        ->helperText('تفعيل وضع الصيانة لتعطيل الوصول المؤقت للمستخدمين')
                        ->default(false)
                        ->reactive()
                        ->afterStateUpdated(function ($state) {
                            Notification::make()
                                ->title($state ? 'تم تفعيل وضع الصيانة' : 'تم تعطيل وضع الصيانة')
                                ->success()
                                ->send();
                        }),

                    TextInput::make('site_title')
                        ->label('عنوان الموقع')
                        ->placeholder('أدخل عنوان الموقع')
                        ->helperText('العنوان الذي سيظهر في شريط المتصفح')
                        ->maxLength(255),

                    TextInput::make('contact_email')
                        ->label('البريد الإلكتروني للتواصل')
                        ->email()
                        ->placeholder('example@domain.com')
                        ->helperText('البريد الإلكتروني لتلقي استفسارات المستخدمين')
                        ->maxLength(255),
                ])
                ->columns(2),
        ];
    }

    /**
     * حفظ الإعدادات عند التحديث.
     *
     * @return void
     */
    public function save(): void
    {
        $data = $this->form->getState();

        // حفظ الإعدادات في قاعدة البيانات أو ملف الإعدادات
        // مثال: تحديث جدول الإعدادات
        DB::table('settings')->updateOrInsert(
            ['key' => 'maintenance_mode'],
            ['value' => $data['maintenance_mode'] ? 1 : 0]
        );

        DB::table('settings')->updateOrInsert(
            ['key' => 'site_title'],
            ['value' => $data['site_title']]
        );

        DB::table('settings')->updateOrInsert(
            ['key' => 'contact_email'],
            ['value' => $data['contact_email']]
        );

        Notification::make()
            ->title('تم حفظ الإعدادات بنجاح')
            ->success()
            ->send();
    }
}
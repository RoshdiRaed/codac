<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OpenSourceProjectResource\Pages;
use App\Filament\Resources\OpenSourceProjectResource\RelationManagers;
use App\Models\OpenSourceProject;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OpenSourceProjectResource extends Resource
{
    protected static ?string $model = OpenSourceProject::class;

    protected static ?string $navigationIcon = 'heroicon-o-code-bracket';

    public static function getModelLabel(): string
    {
        return 'مشروع مفتوح المصدر';
    }

    public static function getPluralModelLabel(): string
    {
        return 'المشاريع مفتوحة المصدر';
    }

    public static function getNavigationLabel(): string
    {
        return 'المشاريع مفتوحة المصدر';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        $count = static::getModel()::count();
        return $count < 3 ? 'danger' : ($count <= 10 ? 'warning' : 'success');
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Section::make('معلومات المشروع')
                ->description('أدخل التفاصيل الأساسية للمشروع مفتوح المصدر')
                ->icon('heroicon-o-code-bracket')
                ->collapsible()
                ->schema([
                    TextInput::make('title')
                        ->label('عنوان المشروع')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('مثال: مكتبة برمجية لتحليل البيانات')
                        ->unique(ignorable: fn ($record) => $record)
                        ->helperText('العنوان يجب أن يكون فريدًا وواضحًا'),

                    TextInput::make('github_url')
                        ->label('رابط GitHub')
                        ->url()
                        ->required()
                        ->prefix('https://')
                        ->placeholder('github.com/username/repo')
                        ->helperText('أدخل رابط مستودع GitHub للمشروع'),

                    TextInput::make('demo_url')
                        ->label('رابط العرض التجريبي')
                        ->url()
                        ->nullable()
                        ->prefix('https://')
                        ->placeholder('example.com')
                        ->helperText('أدخل رابطًا لعرض تجريبي للمشروع (اختياري)'),

                    Select::make('category')
                        ->label('التصنيف')
                        ->options([
                            'library' => 'مكتبة برمجية',
                            'tool' => 'أداة',
                            'framework' => 'إطار عمل',
                            'application' => 'تطبيق',
                            'other' => 'أخرى',
                        ])
                        ->nullable()
                        ->searchable()
                        ->placeholder('اختر تصنيفًا (اختياري)')
                        ->helperText('التصنيف يساعد في تنظيم المشاريع'),
                ]),

            Section::make('صورة المشروع')
                ->description('ارفع صورة تمثل المشروع (اختياري)')
                ->icon('heroicon-o-photo')
                ->collapsible()
                ->schema([
                    FileUpload::make('image')
                        ->label('صورة المشروع')
                        ->image()
                        ->disk('public')
                        ->directory('projects')
                        ->visibility('public')
                        ->maxSize(2048)
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/jpg'])
                        ->imageEditor()
                        ->imageEditorAspectRatios(['16:9', '4:3', '1:1'])
                        ->imageCropAspectRatio('16:9')
                        ->imageResizeMode('cover')
                        ->imageResizeTargetWidth('1200')
                        ->imageResizeTargetHeight('675')
                        ->imageEditorEmptyFillColor('#000000')
                        ->deletable(true)
                        ->downloadable(true)
                        ->openable(true)
                        ->previewable(true)
                        ->columnSpanFull()
                        ->nullable()
                        ->helperText('الحد الأقصى: 2 ميجابايت | الأبعاد المقترحة: 1200x675 | يمكنك تعديل أو استبدال الصورة'),
                ]),

            Section::make('الوصف')
                ->description('اكتب وصفًا موجزًا للمشروع')
                ->icon('heroicon-o-document-text')
                ->collapsible()
                ->schema([
                    Textarea::make('description')
                        ->label('وصف مختصر')
                        ->required()
                        ->rows(5)
                        ->maxLength(500)
                        ->placeholder('اكتب وصفًا موجزًا يشرح المشروع وأهدافه...')
                        ->helperText('الوصف يساعد المستخدمين على فهم طبيعة المشروع (الحد الأقصى: 500 حرف)'),
                ]),

            Section::make('إحصائيات GitHub')
                ->description('أدخل إحصائيات المشروع من GitHub')
                ->icon('heroicon-o-star')
                ->collapsible()
                ->schema([
                    TextInput::make('stars_count')
                        ->label('عدد النجوم (GitHub)')
                        ->numeric()
                        ->default(0)
                        ->minValue(0)
                        ->suffix('⭐')
                        ->helperText('عدد النجوم على مستودع GitHub (إن وجد)'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                ->label('صورة المشروع')
                ->disk('public')
                ->visibility('public')
                ->size(60)
                ->circular()
                ->toggleable(),

                TextColumn::make('title')
                    ->label('عنوان المشروع')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->tooltip(fn ($record) => $record->title),

                TextColumn::make('category')
                    ->label('التصنيف')
                    ->sortable()
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'library' => 'info',
                        'tool' => 'success',
                        'framework' => 'warning',
                        'application' => 'danger',
                        'other' => 'gray',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'library' => 'مكتبة برمجية',
                        'tool' => 'أداة',
                        'framework' => 'إطار عمل',
                        'application' => 'تطبيق',
                        'other' => 'أخرى',
                        default => 'غير محدد',
                    })
                    ->toggleable(),

                TextColumn::make('github_url')
                    ->label('رابط GitHub')
                    ->url(fn ($record) => $record->github_url)
                    ->openUrlInNewTab()
                    ->limit(30)
                    ->icon('heroicon-m-arrow-top-right-on-square')
                    ->formatStateUsing(fn ($state) => str_replace('https://', '', $state))
                    ->color('primary'),

                TextColumn::make('demo_url')
                    ->label('رابط العرض')
                    ->url(fn ($record) => $record->demo_url)
                    ->openUrlInNewTab()
                    ->limit(30)
                    ->icon('heroicon-m-arrow-top-right-on-square')
                    ->formatStateUsing(fn ($state) => $state ? str_replace('https://', '', $state) : '-')
                    ->color('primary')
                    ->toggleable(),

                TextColumn::make('stars_count')
                    ->label('النجوم')
                    ->sortable()
                    ->alignCenter()
                    ->formatStateUsing(fn ($state) => $state . ' ⭐')
                    ->badge()
                    ->color(fn ($state) => $state >= 100 ? 'success' : ($state >= 50 ? 'warning' : 'gray')),

                TextColumn::make('created_at')
                    ->label('تاريخ الإضافة')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('التصنيف')
                    ->options([
                        'library' => 'مكتبة برمجية',
                        'tool' => 'أداة',
                        'framework' => 'إطار عمل',
                        'application' => 'تطبيق',
                        'other' => 'أخرى',
                    ])
                    ->placeholder('اختر تصنيفًا'),

                Tables\Filters\SelectFilter::make('stars_count')
                    ->label('النجوم')
                    ->options([
                        '0-50' => '0-50 نجمة',
                        '51-100' => '51-100 نجمة',
                        '101+' => 'أكثر من 100 نجمة',
                    ])
                    ->query(function (Builder $query, array $data) {
                        if ($data['value'] === '0-50') {
                            $query->whereBetween('stars_count', [0, 50]);
                        } elseif ($data['value'] === '51-100') {
                            $query->whereBetween('stars_count', [51, 100]);
                        } elseif ($data['value'] === '101+') {
                            $query->where('stars_count', '>=', 101);
                        }
                    })
                    ->placeholder('اختر نطاق النجوم'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label('عرض'),
                Tables\Actions\EditAction::make()->label('تعديل'),
                Tables\Actions\DeleteAction::make()->label('حذف'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('حذف متعدد'),
                ]),
            ])
            ->emptyStateHeading('لا توجد مشاريع مفتوحة المصدر بعد')
            ->emptyStateDescription('ابدأ بإنشاء مشروع جديد الآن!')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()->label('إنشاء مشروع جديد'),
            ])
            ->defaultSort('created_at', 'desc')
            ->reorderable('order');
    }

    public static function getRelations(): array
    {
        return [
            // يمكن إضافة RelationManagers هنا إذا لزم الأمر
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOpenSourceProjects::route('/'),
            'create' => Pages\CreateOpenSourceProject::route('/create'),
            'edit' => Pages\EditOpenSourceProject::route('/{record}/edit'),
        ];
    }
}
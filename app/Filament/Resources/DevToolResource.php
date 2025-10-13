<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DevToolResource\Pages;
use App\Models\DevTool;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class DevToolResource extends Resource
{
    protected static ?string $model = DevTool::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static ?string $navigationLabel = 'أدوات التطوير';


    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('معلومات الأداة')
                ->description('أدخل التفاصيل الأساسية للأداة')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255)
                        ->label('اسم الأداة')
                        ->placeholder('مثال: Visual Studio Code')
                        ->autocomplete(false),

                    Forms\Components\Textarea::make('description')
                        ->required()
                        ->rows(4)
                        ->label('وصف الأداة')
                        ->placeholder('اكتب وصفاً مختصراً عن الأداة وفوائدها...')
                        ->maxLength(500)
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('link')
                        ->label('رابط الأداة')
                        ->url()
                        ->nullable()
                        ->prefix('https://')
                        ->placeholder('example.com')
                        ->maxLength(255)
                        ->suffixIcon('heroicon-m-globe-alt'),
                ])
                ->columns(2),

            Forms\Components\Section::make('الصورة والترتيب')
                ->description('حدد صورة الأداة وترتيب عرضها')
                ->schema([
                    Forms\Components\FileUpload::make('image')
                        ->label('صورة الأداة')
                        ->image()
                        ->disk('public')
                        ->directory('dev-tools')
                        ->visibility('public')
                        ->maxSize(1024) // 1MB
                        ->imageEditor()
                        ->imageEditorAspectRatios([
                            '1:1',
                            '16:9',
                            '4:3',
                        ])
                        ->imageCropAspectRatio('1:1')
                        ->imageResizeTargetWidth('400')
                        ->imageResizeTargetHeight('400')
                        ->deletable(true)
                        ->downloadable(true)
                        ->openable(true)
                        ->previewable(true)
                        ->helperText('يفضل رفع صورة بأبعاد 400x400 بكسل')
                        ->nullable()
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('order')
                        ->numeric()
                        ->default(0)
                        ->label('ترتيب العرض')
                        ->helperText('الرقم الأقل يظهر أولاً')
                        ->minValue(0)
                        ->maxValue(1000)
                        ->step(1)
                        ->suffix('📊'),
                ])
                ->columns(1),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('الصورة')
                    ->circular()
                    ->size(50)
                    ->defaultImageUrl(url('/images/placeholder.png')),

                TextColumn::make('title')
                    ->label('اسم الأداة')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->icon('heroicon-m-wrench-screwdriver')
                    ->iconColor('primary'),

                TextColumn::make('description')
                    ->label('الوصف')
                    ->limit(60)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 60) {
                            return null;
                        }
                        return $state;
                    })
                    ->wrap(),

                TextColumn::make('link')
                    ->label('الرابط')
                    ->url(fn($record) => $record->link)
                    ->openUrlInNewTab()
                    ->icon('heroicon-m-arrow-top-right-on-square')
                    ->limit(30)
                    ->toggleable(),

                TextColumn::make('order')
                    ->label('الترتيب')
                    ->sortable()
                    ->badge()
                    ->color('info')
                    ->alignCenter(),

                TextColumn::make('created_at')
                    ->label('تاريخ الإضافة')
                    ->date('Y-m-d')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('عرض'),
                Tables\Actions\EditAction::make()
                    ->label('تعديل'),
                Tables\Actions\DeleteAction::make()
                    ->label('حذف'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('حذف المحدد'),
                ]),
            ])
            ->defaultSort('order', 'asc')
            ->reorderable('order')
            ->emptyStateHeading('لا توجد أدوات')
            ->emptyStateDescription('ابدأ بإضافة أداة تطوير جديدة')
            ->emptyStateIcon('heroicon-o-wrench-screwdriver')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('إضافة أداة جديدة')
                    ->icon('heroicon-m-plus'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDevTools::route('/'),
            'create' => Pages\CreateDevTool::route('/create'),
            'edit' => Pages\EditDevTool::route('/{record}/edit'),
        ];
    }

    // تعريب اسم النموذج (مفرد)
    public static function getModelLabel(): string
    {
        return 'أداة تطوير';
    }

    // تعريب اسم النموذج (جمع)
    public static function getPluralModelLabel(): string
    {
        return 'أدوات التطوير';
    }

    // تعريب عنوان التنقل
    public static function getNavigationLabel(): string
    {
        return 'أدوات التطوير';
    }

    // تعريب الشارة (Badge) - عدد السجلات
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
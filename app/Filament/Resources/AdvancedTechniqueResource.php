<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdvancedTechniqueResource\Pages;
use App\Filament\Resources\AdvancedTechniqueResource\RelationManagers;
use App\Models\AdvancedTechnique;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdvancedTechniqueResource extends Resource
{
    protected static ?string $model = AdvancedTechnique::class;

    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';

    public static function getModelLabel(): string
    {
        return 'تقنية متقدمة';
    }

    public static function getPluralModelLabel(): string
    {
        return 'التقنيات المتقدمة';
    }

    public static function getNavigationLabel(): string
    {
        return 'التقنيات المتقدمة';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        $count = static::getModel()::count();
        return $count < 5 ? 'danger' : ($count <= 15 ? 'warning' : 'success');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات التقنية')
                    ->description('أدخل التفاصيل الأساسية للتقنية المتقدمة')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('عنوان التقنية')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('مثال: تقنيات تحسين الأداء')
                            ->unique(ignorable: fn ($record) => $record)
                            ->helperText('العنوان يجب أن يكون فريدًا وواضحًا'),

                        Forms\Components\Select::make('level')
                            ->label('المستوى')
                            ->options([
                                'beginner' => 'مبتدئ',
                                'intermediate' => 'متوسط',
                                'advanced' => 'متقدم',
                            ])
                            ->required()
                            ->searchable()
                            ->placeholder('اختر مستوى التقنية')
                            ->helperText('حدد مستوى التقنية المناسب'),

                        Forms\Components\Select::make('category')
                            ->label('التصنيف')
                            ->options([
                                'programming' => 'برمجة',
                                'optimization' => 'تحسين الأداء',
                                'security' => 'أمان',
                                'other' => 'أخرى',
                            ])
                            ->nullable()
                            ->searchable()
                            ->placeholder('اختر تصنيفًا (اختياري)')
                            ->helperText('التصنيف يساعد في تنظيم التقنيات'),
                    ])
                    ->collapsible(),

                Forms\Components\Section::make('الصورة')
                    ->description('ارفع صورة تمثل التقنية (اختياري)')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('صورة التقنية')
                            ->image()
                            ->directory('techniques')
                            ->imageEditor()
                            ->imageEditorAspectRatios(['1:1', '4:3', '16:9'])
                            ->visibility('public')
                            ->nullable()
                            ->disk('public')
                            ->maxSize(2048)
                            ->helperText('ارفع صورة بصيغة JPG أو PNG بحجم أقصى 2 ميجابايت'),
                    ]),

                Forms\Components\Section::make('المحتوى')
                    ->description('أضف المحتوى التفصيلي للتقنية')
                    ->schema([
                        Forms\Components\RichEditor::make('content')
                            ->label('المحتوى')
                            ->required()
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'bold', 'italic', 'underline', 'bulletList', 'orderedList', 'link', 'blockquote', 'codeBlock',
                            ])
                            ->placeholder('اكتب تفاصيل التقنية هنا...')
                            ->helperText('استخدم المحرر لإضافة محتوى منسق ومفصل'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('صورة التقنية')
                    ->disk('public')
                    ->circular()
                    ->defaultImageUrl(url('images/default-placeholder.png'))
                    ->toggleable(),

                Tables\Columns\TextColumn::make('title')
                    ->label('عنوان التقنية')
                    ->searchable()
                    ->sortable()
                    ->tooltip(fn ($record) => $record->title),

                Tables\Columns\TextColumn::make('level')
                    ->label('المستوى')
                    ->sortable()
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'beginner' => 'success',
                        'intermediate' => 'warning',
                        'advanced' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'beginner' => 'مبتدئ',
                        'intermediate' => 'متوسط',
                        'advanced' => 'متقدم',
                        default => 'غير محدد',
                    }),

                Tables\Columns\TextColumn::make('category')
                    ->label('التصنيف')
                    ->sortable()
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'programming' => 'info',
                        'optimization' => 'success',
                        'security' => 'danger',
                        'other' => 'gray',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'programming' => 'برمجة',
                        'optimization' => 'تحسين الأداء',
                        'security' => 'أمان',
                        'other' => 'أخرى',
                        default => 'غير محدد',
                    })
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الإضافة')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('level')
                    ->label('المستوى')
                    ->options([
                        'beginner' => 'مبتدئ',
                        'intermediate' => 'متوسط',
                        'advanced' => 'متقدم',
                    ])
                    ->placeholder('اختر مستوى'),

                Tables\Filters\SelectFilter::make('category')
                    ->label('التصنيف')
                    ->options([
                        'programming' => 'برمجة',
                        'optimization' => 'تحسين الأداء',
                        'security' => 'أمان',
                        'other' => 'أخرى',
                    ])
                    ->placeholder('اختر تصنيفًا'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label('عرض'),
                Tables\Actions\EditAction::make()->label('تعديل'),
                Tables\Actions\DeleteAction::make()->label('حذف'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->label('حذف متعدد'),
            ])
            ->emptyStateHeading('لا توجد تقنيات متقدمة بعد')
            ->emptyStateDescription('ابدأ بإنشاء تقنية جديدة الآن!')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()->label('إنشاء تقنية جديدة'),
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
            'index' => Pages\ListAdvancedTechniques::route('/'),
            'create' => Pages\CreateAdvancedTechnique::route('/create'),
            'edit' => Pages\EditAdvancedTechnique::route('/{record}/edit'),
        ];
    }
}
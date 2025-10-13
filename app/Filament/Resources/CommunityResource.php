<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommunityResource\Pages;
use App\Models\Community;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Storage;

class CommunityResource extends Resource
{
    protected static ?string $model = Community::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function getModelLabel(): string
    {
        return 'مجتمع';
    }

    public static function getPluralModelLabel(): string
    {
        return 'المجتمعات';
    }

    public static function getNavigationLabel(): string
    {
        return 'المجتمعات';
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
                Forms\Components\Section::make('معلومات المجتمع')
                    ->description('أدخل التفاصيل الأساسية للمجتمع')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('اسم المجتمع')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('مثال: مجتمع المبرمجين العرب')
                            ->helperText('اختر اسمًا واضحًا ومعبرًا عن المجتمع')
                            ->validationMessages([
                                'required' => 'حقل اسم المجتمع مطلوب',
                                'max' => 'يجب ألا يزيد طول اسم المجتمع عن 255 حرفًا',
                            ]),

                        Forms\Components\TextInput::make('link')
                            ->label('رابط المجتمع')
                            ->url()
                            ->maxLength(255)
                            ->placeholder('مثال: https://example.com')
                            ->prefix('Link')
                            ->helperText('أدخل رابط المجتمع (مثل موقع ويب أو مجموعة تواصل)')
                            ->validationMessages([
                                'url' => 'الرجاء إدخال رابط صحيح يبدأ بـ http:// أو https://',
                                'max' => 'يجب ألا يزيد طول الرابط عن 255 حرفًا',
                            ]),
                    ])
                    ->collapsible(),

                Forms\Components\Section::make('صورة المجتمع')
                    ->description('ارفع صورة تمثل المجتمع')
                    ->schema([
                        FileUpload::make('image')
                            ->label('صورة المجتمع')
                            ->disk('public')
                            ->directory('uploads')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios(['1:1', '4:3', '16:9'])
                            ->maxSize(2048)
                            ->preserveFilenames()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])
                            ->nullable()
                            ->helperText('ارفع صورة بصيغة JPG أو PNG بحجم أقصى 2 ميجابايت')
                            ->validationMessages([
                                'image' => 'الملف المرفوع يجب أن يكون صورة',
                                'mimetypes' => 'نوع الملف غير مدعوم. الرجاء رفع صورة بصيغة JPG أو PNG أو WebP',
                                'max' => 'حجم الصورة يجب ألا يتجاوز 2 ميجابايت',
                                'uploaded' => 'حدث خطأ أثناء رفع الملف. الرجاء المحاولة مرة أخرى',
                            ]),
                    ]),

                Forms\Components\Section::make('الوصف')
                    ->description('اكتب وصفًا موجزًا للمجتمع')
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->label('الوصف')
                            ->required()
                            ->rows(5)
                            ->maxLength(65535)
                            ->placeholder('اكتب وصفًا يوضح أهداف ونشاطات المجتمع...')
                            ->helperText('الوصف يساعد المستخدمين على فهم طبيعة المجتمع')
                            ->validationMessages([
                                'required' => 'حقل الوصف مطلوب',
                                'max' => 'تجاوزت الحد الأقصى لعدد الأحرف المسموح به',
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('صورة المجتمع')
                    ->disk('public')
                    ->circular()
                    ->size(50)
                    ->defaultImageUrl(url('/images/placeholder.png'))
                    ->visibility('public'),

                TextColumn::make('name')
                    ->label('اسم المجتمع')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->tooltip(fn ($record) => $record->name),

                TextColumn::make('description')
                    ->label('الوصف')
                    ->limit(50)
                    ->tooltip(fn ($record) => $record->description)
                    ->toggleable()
                    ->wrap(),

                TextColumn::make('link')
                    ->label('الرابط')
                    ->url(fn ($record) => $record->link)
                    ->openUrlInNewTab()
                    ->formatStateUsing(fn ($state) => $state ? 'زيارة' : '-')
                    ->color('primary')
                    ->icon('heroicon-m-arrow-top-right-on-square'),

                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('تاريخ التحديث')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('عرض')
                    ->color('info'),
                Tables\Actions\EditAction::make()
                    ->label('تعديل')
                    ->color('warning'),
                Tables\Actions\DeleteAction::make()
                    ->label('حذف')
                    ->color('danger'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('حذف المحدد'),
                ]),
            ])
            ->emptyStateHeading('لا توجد مجتمعات بعد')
            ->emptyStateDescription('ابدأ بإنشاء مجتمع جديد الآن!')
            ->emptyStateIcon('heroicon-o-users')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('إنشاء مجتمع جديد')
                    ->icon('heroicon-m-plus'),
            ])
            ->defaultSort('created_at', 'desc')
            ->striped()
            ->paginated([10, 25, 50, 100]);
    }

    public static function getRelations(): array
    {
        return [
            // Add RelationManagers if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCommunities::route('/'),
            'create' => Pages\CreateCommunity::route('/create'),
            'edit' => Pages\EditCommunity::route('/{record}/edit'),
        ];
    }
}
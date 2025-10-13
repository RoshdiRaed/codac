<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubTrackResource\Pages;
use App\Filament\Resources\SubTrackResource\RelationManagers;
use App\Models\SubTrack;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubTrackResource extends Resource
{
    protected static ?string $model = SubTrack::class;

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';

    protected static ?string $navigationLabel = 'المسارات الفرعية';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات المسار الفرعي')
                    ->description('حدد المسار الرئيسي وأدخل تفاصيل المسار الفرعي')
                    ->schema([
                        Select::make('track_id')
                            ->label('المسار الرئيسي')
                            ->relationship('track', 'title')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->native(false)
                            ->placeholder('اختر المسار الرئيسي')
                            ->helperText('اختر المسار الذي ينتمي إليه هذا المسار الفرعي')
                            ->createOptionForm([
                                TextInput::make('title')
                                    ->label('عنوان المسار الرئيسي')
                                    ->required(),
                                Textarea::make('description')
                                    ->label('وصف المسار الرئيسي'),
                            ])
                            ->columnSpanFull(),

                        TextInput::make('title')
                            ->label('عنوان المسار الفرعي')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('مثال: أساسيات Laravel')
                            ->autocomplete(false),

                        TextInput::make('icon')
                            ->label('الأيقونة (رمز أو Emoji)')
                            ->maxLength(50)
                            ->placeholder('🎯 أو heroicon-o-rocket-launch')
                            ->helperText('يمكنك استخدام emoji أو اسم أيقونة من Heroicons')
                            ->suffixIcon('heroicon-m-face-smile'),

                        Textarea::make('description')
                            ->label('وصف مختصر')
                            ->rows(3)
                            ->maxLength(500)
                            ->placeholder('اكتب وصفاً مختصراً للمسار الفرعي...')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('محتوى المسار')
                    ->description('المحتوى التفصيلي للمسار الفرعي')
                    ->schema([
                        RichEditor::make('content')
                            ->label('محتوى المسار الفرعي')
                            ->required()
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'strike',
                                'link',
                                'heading',
                                'bulletList',
                                'orderedList',
                                'blockquote',
                                'codeBlock',
                                'h2',
                                'h3',
                            ])
                            ->placeholder('اكتب محتوى المسار التعليمي هنا...')
                            ->disableToolbarButtons([
                                'attachFiles',
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('track.title')
                    ->label('المسار الرئيسي')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('success')
                    ->icon('heroicon-m-book-open'),

                TextColumn::make('title')
                    ->label('عنوان المسار الفرعي')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(40)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 40) {
                            return null;
                        }
                        return $state;
                    }),

                TextColumn::make('icon')
                    ->label('الأيقونة')
                    ->alignCenter()
                    ->size('lg'),

                TextColumn::make('description')
                    ->label('الوصف')
                    ->limit(50)
                    ->wrap()
                    ->toggleable()
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }
                        return $state;
                    }),

                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('آخر تحديث')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('track_id')
                    ->label('المسار الرئيسي')
                    ->relationship('track', 'title')
                    ->searchable()
                    ->preload()
                    ->native(false),
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
            ->defaultSort('created_at', 'desc')
            ->emptyStateHeading('لا توجد مسارات فرعية')
            ->emptyStateDescription('ابدأ بإضافة مسار فرعي جديد')
            ->emptyStateIcon('heroicon-o-queue-list')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('إضافة مسار فرعي')
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
            'index' => Pages\ListSubTracks::route('/'),
            'create' => Pages\CreateSubTrack::route('/create'),
            'edit' => Pages\EditSubTrack::route('/{record}/edit'),
        ];
    }

    // تعريب اسم النموذج (مفرد)
    public static function getModelLabel(): string
    {
        return 'مسار فرعي';
    }

    // تعريب اسم النموذج (جمع)
    public static function getPluralModelLabel(): string
    {
        return 'المسارات الفرعية';
    }

    // تعريب عنوان التنقل
    public static function getNavigationLabel(): string
    {
        return 'المسارات الفرعية';
    }

    // تعريب الشارة (Badge) - عدد السجلات
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    // لون الشارة
    public static function getNavigationBadgeColor(): ?string
    {
        $count = static::getModel()::count();
        
        if ($count > 20) {
            return 'success';
        } elseif ($count > 10) {
            return 'warning';
        }
        
        return 'danger';
    }
}
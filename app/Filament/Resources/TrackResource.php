<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrackResource\Pages;
use App\Filament\Resources\TrackResource\RelationManagers;
use App\Models\Track;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TrackResource extends Resource
{
    protected static ?string $model = Track::class;

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';


    public static function getModelLabel(): string
    {
        return 'مسار';
    }

    public static function getPluralModelLabel(): string
    {
        return 'المسارات';
    }

    public static function getNavigationLabel(): string
    {
        return 'المسارات';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        $count = static::getModel()::count();
        return $count < 10 ? 'danger' : ($count <= 20 ? 'warning' : 'success');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات المسار')
                    ->description('أدخل التفاصيل الأساسية للمسار')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('اسم المسار')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('مثال: تعلم البرمجة')
                            ->helperText('اسم المسار يجب أن يكون واضحًا ومميزًا'),

                        Forms\Components\TextInput::make('category')
                            ->label('التصنيف')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('مثال: تطوير ويب')
                            ->helperText('حدد تصنيف المسار لتسهيل البحث'),

                        Forms\Components\TextInput::make('icon')
                            ->label('الأيقونة (رمز تعبيري)')
                            ->maxLength(2)
                            ->default('🚀')
                            ->placeholder('مثال: 🚀')
                            ->helperText('اختر رمزًا تعبيريًا يعبر عن المسار'),
                    ])
                    ->collapsible(),

                Forms\Components\Section::make('الوصف')
                    ->description('اكتب وصفًا موجزًا للمسار')
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->label('الوصف')
                            ->required()
                            ->rows(4)
                            ->placeholder('اكتب وصفًا موجزًا يشرح محتوى المسار...')
                            ->helperText('الوصف يساعد المستخدمين على فهم محتوى المسار'),
                    ]),

                // Forms\Components\RichEditor::make('content')
                //     ->label('محتوى المسار')
                //     ->required()
                //     ->toolbarButtons([
                //         'bold', 'italic', 'underline', 'bulletList', 'orderedList', 'link', 'blockquote', 'codeBlock',
                //     ])
                //     ->columnSpanFull()
                //     ->helperText('أضف محتوى تفصيلي للمسار باستخدام المحرر'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('اسم المسار')
                    ->searchable()
                    ->sortable()
                    ->tooltip(fn ($record) => $record->title),

                TextColumn::make('category')
                    ->label('التصنيف')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'تطوير ويب' => 'info',
                        'برمجة' => 'warning',
                        'حياة' => 'success',
                        default => 'gray',
                    }),

                TextColumn::make('icon')
                    ->label('الأيقونة')
                    ->formatStateUsing(fn ($state) => $state ?? '❓')
                    ->alignCenter(),

                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('التصنيف')
                    ->options([
                        'تطوير ويب' => 'تطوير ويب',
                        'برمجة' => 'برمجة',
                        'حياة' => 'حياة',
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
            ->emptyStateHeading('لا توجد مسارات بعد')
            ->emptyStateDescription('ابدأ بإنشاء مسار جديد الآن!')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()->label('إنشاء مسار جديد'),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            // يمكن إضافة RelationManagers هنا، مثل SubTrackRelationManager
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTracks::route('/'),
            'create' => Pages\CreateTrack::route('/create'),
            'edit' => Pages\EditTrack::route('/{record}/edit'),
        ];
    }
}
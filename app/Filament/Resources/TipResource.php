<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TipResource\Pages;
use App\Models\Tip;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class TipResource extends Resource
{
    protected static ?string $model = Tip::class;

    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';

    protected static ?string $navigationLabel = 'النصائح';

    // protected static ?string $navigationGroup = 'المحتوى';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->label('عنوان النصيحة')
                ->required()
                ->maxLength(255)
                ->placeholder('أدخل عنوان النصيحة'),

            Forms\Components\RichEditor::make('content')
                ->label('محتوى النصيحة')
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
                ])
                ->placeholder('اكتب محتوى النصيحة هنا...'),

            Forms\Components\Select::make('category')
                ->label('التصنيف')
                ->options([
                    'tools' => 'أدوات',
                    'life' => 'نصائح حياتية',
                    'code' => 'برمجة',
                ])
                ->required()
                ->native(false)
                ->placeholder('اختر التصنيف'),

            Forms\Components\Select::make('level')
                ->label('المستوى')
                ->options([
                    'beginner' => 'مبتدئ',
                    'intermediate' => 'متوسط',
                    'advanced' => 'متقدم',
                ])
                ->required()
                ->native(false)
                ->placeholder('اختر المستوى'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }
                        return $state;
                    }),

                TextColumn::make('category')
                    ->label('التصنيف')
                    ->sortable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'tools' => 'info',
                        'life' => 'success',
                        'code' => 'warning',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'tools' => 'أدوات',
                        'life' => 'نصائح حياتية',
                        'code' => 'برمجة',
                        default => $state,
                    }),

                TextColumn::make('level')
                    ->label('المستوى')
                    ->sortable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'beginner' => 'success',
                        'intermediate' => 'warning',
                        'advanced' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'beginner' => 'مبتدئ',
                        'intermediate' => 'متوسط',
                        'advanced' => 'متقدم',
                        default => $state,
                    }),

                TextColumn::make('created_at')
                    ->label('تاريخ الإضافة')
                    ->date('Y-m-d')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('التصنيف')
                    ->options([
                        'tools' => 'أدوات',
                        'life' => 'نصائح حياتية',
                        'code' => 'برمجة',
                    ])
                    ->native(false),

                Tables\Filters\SelectFilter::make('level')
                    ->label('المستوى')
                    ->options([
                        'beginner' => 'مبتدئ',
                        'intermediate' => 'متوسط',
                        'advanced' => 'متقدم',
                    ])
                    ->native(false),
            ])
            ->actions([
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
            ->emptyStateHeading('لا توجد نصائح')
            ->emptyStateDescription('ابدأ بإضافة نصيحة جديدة')
            ->emptyStateIcon('heroicon-o-light-bulb');
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
            'index' => Pages\ListTips::route('/'),
            'create' => Pages\CreateTip::route('/create'),
            'edit' => Pages\EditTip::route('/{record}/edit'),
        ];
    }

    // تعريب اسم النموذج (مفرد)
    public static function getModelLabel(): string
    {
        return 'نصيحة';
    }

    // تعريب اسم النموذج (جمع)
    public static function getPluralModelLabel(): string
    {
        return 'النصائح';
    }

    // تعريب عنوان التنقل
    public static function getNavigationLabel(): string
    {
        return 'النصائح';
    }

    // تعريب الشارة (Badge) - عدد السجلات
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    // لون الشارة
    // public static function getNavigationBadgeColor(): ?string
    // {
    //     return static::getModel()::count() > 10 ? 'success' : 'warning';
    // }
}
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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->label('عنوان النصيحة')
                ->required()
                ->maxLength(255),

            Forms\Components\RichEditor::make('content')
                ->label('محتوى النصيحة')
                ->required()
                ->columnSpanFull(),

            Forms\Components\Select::make('category')
                ->label('التصنيف')
                ->options([
                    'tools' => 'أدوات',
                    'life' => 'نصائح حياتية',
                    'code' => 'برمجة',
                ])
                ->required(),

            Forms\Components\Select::make('level')
                ->label('المستوى')
                ->options([
                    'beginner' => 'مبتدئ',
                    'intermediate' => 'متوسط',
                    'advanced' => 'متقدم',
                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category')
                    ->label('التصنيف')
                    ->sortable(),

                TextColumn::make('level')
                    ->label('المستوى')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('تاريخ الإضافة')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                // يمكنك إضافة فلترات هنا، مثل فلترة حسب التصنيف أو المستوى
                // Example:
                // Tables\Filters\SelectFilter::make('category')->options([
                //     'tools' => 'أدوات',
                //     'life' => 'نصائح حياتية',
                //     'code' => 'برمجة',
                // ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            // أضف هنا RelationManagers إذا كان هناك علاقات
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
}

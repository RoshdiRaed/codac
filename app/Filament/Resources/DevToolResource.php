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

class DevToolResource extends Resource
{
    protected static ?string $model = DevTool::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->required()
                ->maxLength(255)
                ->label('اسم الأداة'),

            Forms\Components\Textarea::make('description')
                ->required()
                ->rows(3)
                ->label('وصف الأداة'),

            Forms\Components\TextInput::make('image')
                ->label('رابط الصورة أو مسارها')
                ->maxLength(255)
                ->nullable(),

            Forms\Components\TextInput::make('order')
                ->numeric()
                ->default(0)
                ->label('ترتيب العرض'),

            Forms\Components\TextInput::make('link')
                ->label('رابط الأداة')
                ->url()
                ->nullable()
                ->prefix('https://')
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('اسم الأداة')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('description')
                    ->label('الوصف')
                    ->limit(50),

                TextColumn::make('order')
                    ->label('ترتيب العرض')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('order');
    }

    public static function getRelations(): array
    {
        return [
            // يمكن إضافة RelationManagers هنا في المستقبل
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
}

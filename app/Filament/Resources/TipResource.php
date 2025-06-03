<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TipResource\Pages;
use App\Filament\Resources\TipResource\RelationManagers;
use App\Models\Tip;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TipResource extends Resource
{
    protected static ?string $model = Tip::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->label('عنوان النصيحة')
                ->required(),

            Forms\Components\Textarea::make('content')
                ->label('محتوى النصيحة')
                ->required()
                ->rows(5),

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
                TextColumn::make('title')->label('العنوان')->searchable()->sortable(),
                TextColumn::make('category')->label('التصنيف'),
                TextColumn::make('level')->label('المستوى'),
                TextColumn::make('created_at')->label('تاريخ الإضافة')->date(),
            ])
            ->filters([
                
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
            'index' => Pages\ListTips::route('/'),
            'create' => Pages\CreateTip::route('/create'),
            'edit' => Pages\EditTip::route('/{record}/edit'),
        ];
    }
}

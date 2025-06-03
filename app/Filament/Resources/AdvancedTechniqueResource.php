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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->label('عنوان التقنية')
                ->required(),

            Forms\Components\Textarea::make('content')
                ->label('المحتوى')
                ->required()
                ->rows(5),

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
                Tables\Columns\TextColumn::make('title')->label('العنوان')->searchable(),
                Tables\Columns\TextColumn::make('level')->label('المستوى')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->date()->label('تاريخ الإضافة'),
            ])
            ->filters([
                // بإمكانك إضافة فلاتر هنا إذا رغبت
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListAdvancedTechniques::route('/'),
            'create' => Pages\CreateAdvancedTechnique::route('/create'),
            'edit' => Pages\EditAdvancedTechnique::route('/{record}/edit'),
        ];
    }

}

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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubTrackResource extends Resource
{
    protected static ?string $model = SubTrack::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('track_id')
                    ->label('المسار الرئيسي')
                    ->relationship('track', 'title')
                    ->required(),

                TextInput::make('title')->label('العنوان')->required(),
                Textarea::make('description')->label('الوصف'),
                TextInput::make('icon')->label('الأيقونة (رمز أو Emoji)'),
                Forms\Components\RichEditor::make('content')
                    ->label('محتوى المسار')
                    ->required()
                    ->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('track.title')->label('المسار الرئيسي'),
                Tables\Columns\TextColumn::make('title')->label('العنوان'),
                Tables\Columns\TextColumn::make('description')->label('الوصف')->limit(50),
                Tables\Columns\TextColumn::make('icon')->label('الأيقونة'),
                Tables\Columns\TextColumn::make('created_at')->label('تاريخ الإنشاء')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
}

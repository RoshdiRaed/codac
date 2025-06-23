<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommunityResource\Pages;
use App\Filament\Resources\CommunityResource\RelationManagers;
use App\Models\Community;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;


class CommunityResource extends Resource
{
    protected static ?string $model = Community::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('اسم المجتمع')
                    ->required()
                    ->maxLength(255),


                FileUpload::make('image')
                    ->image() // لجعل الحقل يقبل الصور فقط
                    ->directory('uploads') // تحديد المجلد داخل storage/app/public/
                    ->imageEditor() // (اختياري) لتفعيل تعديل الصورة قبل الحفظ
                    ->visibility('public') // تأكد أن الملف يمكن عرضه
                    ->nullable(),


                Forms\Components\Textarea::make('description')
                    ->label('الوصف')
                    ->required()
                    ->maxLength(65535),

                Forms\Components\TextInput::make('link')
                    ->label('الرابط')
                    ->url()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('الاسم')->sortable()->searchable(),
                ImageColumn::make('image')
                ->label('الأيقونة')
                ->disk('public')
                ->circular(),


                Tables\Columns\TextColumn::make('description')->label('الوصف')->limit(50),
                Tables\Columns\TextColumn::make('link')
                ->label('الرابط')
                ->url(fn ($record) => $record->link)
                ->openUrlInNewTab(),

                Tables\Columns\TextColumn::make('created_at')->label('تاريخ الإنشاء')->dateTime(),
            ])

            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
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

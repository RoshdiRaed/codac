<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OpenSourceProjectResource\Pages;
use App\Filament\Resources\OpenSourceProjectResource\RelationManagers;
use App\Models\OpenSourceProject;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OpenSourceProjectResource extends Resource
{
    protected static ?string $model = OpenSourceProject::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')
                ->required()
                ->label('عنوان المشروع'),

            Textarea::make('description')
                ->rows(4)
                ->label('وصف مختصر'),

            TextInput::make('github_url')
                ->url()
                ->label('رابط GitHub'),

            TextInput::make('demo_url')
                ->url()
                ->label('رابط العرض التجريبي')
                ->nullable(),

                FileUpload::make('image')
                ->image()
                ->directory('projects')
                ->label('صورة')
                ->preserveFilenames()
                ->visibility('public')
                ->maxSize(1024)
                ->imageEditor()
                ->imageResizeMode('cover')
                ->columnSpanFull(),


            TextInput::make('stars_count')
                ->numeric()
                ->label('عدد النجوم (GitHub)')
                ->default(0)

        ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->label('العنوان'),
                TextColumn::make('github_url')->label('GitHub')->url(fn($record) => $record->github_url),
                TextColumn::make('stars_count')->label('⭐ GitHub'),
                TextColumn::make('created_at')->date()->label('تاريخ الإضافة'),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListOpenSourceProjects::route('/'),
            'create' => Pages\CreateOpenSourceProject::route('/create'),
            'edit' => Pages\EditOpenSourceProject::route('/{record}/edit'),
        ];
    }
}

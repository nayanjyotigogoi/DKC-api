<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MagazineArticleResource\Pages;
use App\Models\MagazineArticle;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class MagazineArticleResource extends Resource
{
    protected static ?string $model = MagazineArticle::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('magazine_issue_id')
                    ->relationship('issue', 'title')
                    ->searchable()
                    ->required()
                    ->label('Issue'),
                TextInput::make('title')->required(),
                Textarea::make('excerpt'),
                RichEditor::make('content')->columnSpanFull(),
                TextInput::make('author'),
                TextInput::make('tag'),
                TextInput::make('sort_order')->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable(),
                TextColumn::make('author'),
                TextColumn::make('tag'),
                TextColumn::make('issue.title')->label('Issue'),
                TextColumn::make('sort_order'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListMagazineArticles::route('/'),
            'create' => Pages\CreateMagazineArticle::route('/create'),
            'edit'   => Pages\EditMagazineArticle::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool { return auth()->user()?->can('view magazine') ?? false; }
    public static function canCreate(): bool  { return auth()->user()?->can('create magazine') ?? false; }
    public static function canEdit($record): bool   { return auth()->user()?->can('edit magazine') ?? false; }
    public static function canDelete($record): bool { return auth()->user()?->can('delete magazine') ?? false; }
}

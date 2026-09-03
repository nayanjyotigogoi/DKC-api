<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KoreanPhraseResource\Pages;
use App\Models\KoreanPhrase;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;

class KoreanPhraseResource extends Resource
{
    protected static ?string $model = KoreanPhrase::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('korean')->required(),
                TextInput::make('english')->required(),
                TextInput::make('romanized'),
                TextInput::make('sort_order')->numeric(),
                Toggle::make('is_active')->default(true),
                Toggle::make('is_featured')
                    ->label('Feature as Phrase of the Day')
                    ->helperText('Turn on to pin this phrase as today\'s Phrase of the Day. Turn off to return to automatic daily rotation.')
                    ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('korean')->searchable(),
                TextColumn::make('english')->searchable(),
                TextColumn::make('romanized'),
                TextColumn::make('sort_order')->sortable(),
                IconColumn::make('is_active')->boolean(),
                IconColumn::make('is_featured')->boolean()->label('Featured Today'),
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
            'index'  => Pages\ListKoreanPhrases::route('/'),
            'create' => Pages\CreateKoreanPhrase::route('/create'),
            'edit'   => Pages\EditKoreanPhrase::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool { return auth()->user()?->can('view phrases') ?? false; }
    public static function canCreate(): bool  { return auth()->user()?->can('create phrases') ?? false; }
    public static function canEdit($record): bool   { return auth()->user()?->can('edit phrases') ?? false; }
    public static function canDelete($record): bool { return auth()->user()?->can('delete phrases') ?? false; }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MediaPickResource\Pages;
use App\Models\MediaPick;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;

class MediaPickResource extends Resource
{
    protected static ?string $model = MediaPick::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('type')
                    ->options([
                        'Drama'  => 'Drama',
                        'Movie'  => 'Movie',
                        'Book'   => 'Book',
                        'Music'  => 'Music',
                        'Other'  => 'Other',
                    ]),
                TextInput::make('title')->required(),
                TextInput::make('korean_title'),
                Textarea::make('description')->columnSpanFull(),
                TextInput::make('tag'),
                TextInput::make('streaming_platform'),
                TextInput::make('streaming_url')
                    ->label('Streaming URL')
                    ->helperText('Paste the full link e.g. https://www.netflix.com/title/...')
                    ->url()
                    ->columnSpanFull(),
                Toggle::make('is_active')->default(true),
                TextInput::make('sort_order')->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                BadgeColumn::make('type'),
                TextColumn::make('title')->searchable(),
                TextColumn::make('korean_title'),
                TextColumn::make('tag'),
                TextColumn::make('streaming_platform'),
                IconColumn::make('is_active')->boolean(),
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
            'index'  => Pages\ListMediaPicks::route('/'),
            'create' => Pages\CreateMediaPick::route('/create'),
            'edit'   => Pages\EditMediaPick::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool { return auth()->user()?->can('view media_picks') ?? false; }
    public static function canCreate(): bool  { return auth()->user()?->can('create media_picks') ?? false; }
    public static function canEdit($record): bool   { return auth()->user()?->can('edit media_picks') ?? false; }
    public static function canDelete($record): bool { return auth()->user()?->can('delete media_picks') ?? false; }
}

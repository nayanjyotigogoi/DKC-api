<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MagazineIssueResource\Pages;
use App\Models\MagazineIssue;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;

class MagazineIssueResource extends Resource
{
    protected static ?string $model = MagazineIssue::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required(),
                TextInput::make('slug')->required(),
                TextInput::make('issue_label'),
                TextInput::make('year')->numeric(),
                TextInput::make('month')->numeric(),
                TextInput::make('cover_color'),
                TextInput::make('cover_accent'),
                TextInput::make('tagline'),
                Textarea::make('description')->columnSpanFull(),
                Toggle::make('is_featured'),
                TextInput::make('page_count')->numeric(),
                FileUpload::make('pdf_path')
                    ->label('Handmade Edition PDF')
                    ->helperText('Upload the original handmade PDF. It will be stored privately and only viewable — not downloadable.')
                    ->disk('private')
                    ->directory('magazines')
                    ->acceptedFileTypes(['application/pdf'])
                    ->maxSize(2097152)
                    ->columnSpanFull(),
                TextInput::make('sort_order')->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable(),
                TextColumn::make('issue_label'),
                TextColumn::make('year')->sortable(),
                TextColumn::make('month'),
                IconColumn::make('is_featured')->boolean(),
                TextColumn::make('page_count'),
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
            'index'  => Pages\ListMagazineIssues::route('/'),
            'create' => Pages\CreateMagazineIssue::route('/create'),
            'edit'   => Pages\EditMagazineIssue::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool { return auth()->user()?->can('view magazine') ?? false; }
    public static function canCreate(): bool  { return auth()->user()?->can('create magazine') ?? false; }
    public static function canEdit($record): bool   { return auth()->user()?->can('edit magazine') ?? false; }
    public static function canDelete($record): bool { return auth()->user()?->can('delete magazine') ?? false; }
}

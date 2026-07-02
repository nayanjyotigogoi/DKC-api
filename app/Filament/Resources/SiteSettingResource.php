<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSettingResource\Pages;
use App\Models\SiteSetting;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;

class SiteSettingResource extends Resource
{
    protected static ?string $model = SiteSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('key')->disabled(),
                TextInput::make('label'),
                TextInput::make('value')->required(),
                Select::make('type')
                    ->options([
                        'string' => 'String',
                        'number' => 'Number',
                        'json'   => 'JSON',
                    ]),
                TextInput::make('group'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key')->searchable()->sortable(),
                TextColumn::make('label'),
                TextColumn::make('value'),
                TextColumn::make('group'),
                BadgeColumn::make('type'),
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
            'index'  => Pages\ListSiteSettings::route('/'),
            'create' => Pages\CreateSiteSetting::route('/create'),
            'edit'   => Pages\EditSiteSetting::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool { return auth()->user()?->can('view settings') ?? false; }
    public static function canEdit($record): bool   { return auth()->user()?->can('edit settings') ?? false; }
    public static function canCreate(): bool  { return false; }
    public static function canDelete($record): bool { return false; }
}

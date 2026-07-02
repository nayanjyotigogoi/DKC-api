<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GoodieResource\Pages;
use App\Models\Goodie;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;

class GoodieResource extends Resource
{
    protected static ?string $model = Goodie::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('korean_name'),
                Select::make('category')
                    ->options([
                        'stationery'   => 'Stationery',
                        'apparel'      => 'Apparel',
                        'accessories'  => 'Accessories',
                        'collectibles' => 'Collectibles',
                    ]),
                TextInput::make('price')->numeric()->required(),
                Textarea::make('description')->columnSpanFull(),
                Select::make('availability')
                    ->options([
                        'available' => 'Available',
                        'limited'   => 'Limited',
                        'sold-out'  => 'Sold Out',
                    ])
                    ->default('available'),
                TextInput::make('image_path'),
                TextInput::make('color'),
                TextInput::make('icon'),
                TextInput::make('sort_order')->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('korean_name'),
                BadgeColumn::make('category'),
                TextColumn::make('price')->prefix('₹'),
                BadgeColumn::make('availability')
                    ->colors([
                        'success' => 'available',
                        'warning' => 'limited',
                        'danger'  => 'sold-out',
                    ]),
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
            'index'  => Pages\ListGoodies::route('/'),
            'create' => Pages\CreateGoodie::route('/create'),
            'edit'   => Pages\EditGoodie::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool { return auth()->user()?->can('view goodies') ?? false; }
    public static function canCreate(): bool  { return auth()->user()?->can('create goodies') ?? false; }
    public static function canEdit($record): bool   { return auth()->user()?->can('edit goodies') ?? false; }
    public static function canDelete($record): bool { return auth()->user()?->can('delete goodies') ?? false; }
}

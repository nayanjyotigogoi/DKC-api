<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryPhotoResource\Pages;
use App\Models\GalleryPhoto;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class GalleryPhotoResource extends Resource
{
    protected static ?string $model = GalleryPhoto::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('caption'),
                Select::make('category')
                    ->options([
                        'events'   => 'Events',
                        'members'  => 'Members',
                        'culture'  => 'Culture',
                        'campus'   => 'Campus',
                    ]),
                TextInput::make('event_name'),
                TextInput::make('year')->numeric(),
                Select::make('aspect')
                    ->options([
                        'portrait'  => 'Portrait',
                        'landscape' => 'Landscape',
                        'square'    => 'Square',
                    ]),
                FileUpload::make('image_path')
                    ->label('Upload New Photo')
                    ->image()
                    ->disk('gallery')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(10240),
                Placeholder::make('current_image')
                    ->label('Current Photo')
                    ->content(fn ($record) => $record?->image_path
                        ? new \Illuminate\Support\HtmlString(
                            '<img src="' . config('app.url') . '/gallery/images/' . $record->image_path . '"
                                  style="max-width:300px; max-height:200px; border-radius:8px; object-fit:cover;" />'
                        )
                        : 'No image uploaded yet'
                    )
                    ->visibleOn('edit'),
                TextInput::make('color'),
                TextInput::make('icon'),
                TextInput::make('sort_order')->numeric(),
                Toggle::make('is_visible')->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')
                    ->label('Photo')
                    ->disk('gallery')
                    ->height(60)
                    ->width(80),
                TextColumn::make('caption')->searchable(),
                BadgeColumn::make('category'),
                TextColumn::make('event_name'),
                TextColumn::make('year'),
                TextColumn::make('aspect'),
                IconColumn::make('is_visible')->boolean(),
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
            'index'  => Pages\ListGalleryPhotos::route('/'),
            'create' => Pages\CreateGalleryPhoto::route('/create'),
            'edit'   => Pages\EditGalleryPhoto::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool { return auth()->user()?->can('view gallery') ?? false; }
    public static function canCreate(): bool  { return auth()->user()?->can('create gallery') ?? false; }
    public static function canEdit($record): bool   { return auth()->user()?->can('edit gallery') ?? false; }
    public static function canDelete($record): bool { return auth()->user()?->can('delete gallery') ?? false; }
}

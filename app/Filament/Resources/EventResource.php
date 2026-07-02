<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\DateTimePicker;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('title')->required(),
                    TextInput::make('korean_title'),
                    TextInput::make('slug')->required(),
                    TextInput::make('date')->required()->placeholder('e.g. October 9, 2024'),
                    DateTimePicker::make('date_iso')->required(),
                    TextInput::make('time'),
                    TextInput::make('location'),
                    TextInput::make('category'),
                    Select::make('status')
                        ->options([
                            'upcoming'  => 'Upcoming',
                            'live'      => 'Live',
                            'completed' => 'Completed',
                        ])
                        ->default('upcoming'),
                    TextInput::make('color')->placeholder('#8B1E24'),
                    TextInput::make('image'),
                    Toggle::make('is_featured'),
                    TextInput::make('sort_order')->numeric(),
                ]),

                Textarea::make('description')->columnSpanFull(),
                Textarea::make('long_description')->columnSpanFull(),

                Repeater::make('highlights')
                    ->schema([
                        TextInput::make('item')->required(),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('korean_title'),
                TextColumn::make('date')->sortable(),
                TextColumn::make('time'),
                TextColumn::make('location'),
                BadgeColumn::make('status')
                    ->colors([
                        'warning'   => 'upcoming',
                        'success'   => 'live',
                        'secondary' => 'completed',
                    ]),
                TextColumn::make('category'),
                IconColumn::make('is_featured')->boolean(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'upcoming'  => 'Upcoming',
                        'live'      => 'Live',
                        'completed' => 'Completed',
                    ]),
            ])
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
            'index'  => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit'   => Pages\EditEvent::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool { return auth()->user()?->can('view events') ?? false; }
    public static function canCreate(): bool  { return auth()->user()?->can('create events') ?? false; }
    public static function canEdit($record): bool   { return auth()->user()?->can('edit events') ?? false; }
    public static function canDelete($record): bool { return auth()->user()?->can('delete events') ?? false; }
}

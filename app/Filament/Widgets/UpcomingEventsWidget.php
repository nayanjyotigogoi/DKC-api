<?php

namespace App\Filament\Widgets;

use App\Models\Event;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class UpcomingEventsWidget extends BaseWidget
{
    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = 'full';

    protected static ?string $heading = 'Upcoming Events';

    protected function getTableQuery(): Builder
    {
        return Event::query()
            ->where('status', 'upcoming')
            ->orderBy('date_iso')
            ->limit(5);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('title')
                ->label('Event')
                ->searchable(),

            Tables\Columns\TextColumn::make('date')
                ->label('Date'),

            Tables\Columns\TextColumn::make('location')
                ->label('Venue')
                ->toggleable(),

            Tables\Columns\TextColumn::make('category')
                ->label('Category'),

            Tables\Columns\BadgeColumn::make('status')
                ->colors([
                    'success' => 'upcoming',
                    'secondary' => 'past',
                ]),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('edit')
                ->label('Edit')
                ->icon('heroicon-s-pencil')
                ->url(fn (Event $record) => route('filament.resources.events.edit', $record)),
        ];
    }
}

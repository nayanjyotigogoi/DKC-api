<?php

namespace App\Filament\Widgets;

use App\Models\MemberApplication;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentApplicationsWidget extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    protected static ?string $heading = 'Recent Member Applications';

    protected function getTableQuery(): Builder
    {
        return MemberApplication::query()->latest()->limit(8);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')
                ->label('Name')
                ->searchable(),

            Tables\Columns\TextColumn::make('email')
                ->label('Email')
                ->searchable(),

            Tables\Columns\TextColumn::make('occupation')
                ->label('Occupation')
                ->toggleable(),

            Tables\Columns\BadgeColumn::make('status')
                ->label('Status')
                ->colors([
                    'warning' => 'pending',
                    'success' => 'approved',
                    'danger'  => 'rejected',
                ]),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Applied')
                ->dateTime('d M Y')
                ->sortable(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('view')
                ->label('Review')
                ->icon('heroicon-s-eye')
                ->url(fn (MemberApplication $record) => route('filament.resources.member-applications.edit', $record)),
        ];
    }
}

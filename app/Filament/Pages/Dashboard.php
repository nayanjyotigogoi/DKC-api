<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\RecentApplicationsWidget;
use App\Filament\Widgets\StatsOverviewWidget;
use App\Filament\Widgets\UpcomingEventsWidget;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $title = 'Dashboard';

    protected static string $view = 'filament.pages.dashboard';

    protected function getWidgets(): array
    {
        return [
            StatsOverviewWidget::class,
            RecentApplicationsWidget::class,
            UpcomingEventsWidget::class,
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [];
    }

    protected function getViewData(): array
    {
        return [
            'frontendUrl' => env('FRONTEND_URL', 'http://localhost:3000'),
        ];
    }
}

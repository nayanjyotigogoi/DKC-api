<?php

namespace App\Filament\Widgets;

use App\Models\Event;
use App\Models\GalleryPhoto;
use App\Models\Goodie;
use App\Models\MagazineArticle;
use App\Models\MagazineIssue;
use App\Models\Member;
use App\Models\MemberApplication;
use App\Models\Resource;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getCards(): array
    {
        $pendingApps = MemberApplication::where('status', 'pending')->count();

        return [
            Card::make('Total Members', MemberApplication::where('status', 'approved')->count())
                ->description('Registered club members')
                ->descriptionIcon('heroicon-s-user-group')
                ->color('success'),

            Card::make('Pending Applications', $pendingApps)
                ->description($pendingApps > 0 ? 'Awaiting review' : 'All clear')
                ->descriptionIcon('heroicon-s-inbox')
                ->color($pendingApps > 0 ? 'warning' : 'success'),

            Card::make('Upcoming Events', Event::where('status', 'upcoming')->count())
                ->description('Scheduled events')
                ->descriptionIcon('heroicon-s-calendar')
                ->color('primary'),

            Card::make('Magazine Issues', MagazineIssue::count())
                ->description(MagazineArticle::count() . ' articles total')
                ->descriptionIcon('heroicon-s-book-open')
                ->color('secondary'),

            Card::make('Gallery Photos', GalleryPhoto::count())
                ->description('In the gallery')
                ->descriptionIcon('heroicon-s-photograph')
                ->color('secondary'),

            Card::make('Goodies & Merch', Goodie::where('availability', '!=', 'unavailable')->count())
                ->description('Active listings')
                ->descriptionIcon('heroicon-s-shopping-bag')
                ->color('secondary'),

            Card::make('Resources', Resource::where('is_active', true)->count())
                ->description('Learning resources')
                ->descriptionIcon('heroicon-s-academic-cap')
                ->color('secondary'),
        ];
    }
}

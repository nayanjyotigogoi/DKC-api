<?php

namespace App\Filament\Resources\MagazineIssueResource\Pages;

use App\Filament\Resources\MagazineIssueResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMagazineIssues extends ListRecords
{
    protected static string $resource = MagazineIssueResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

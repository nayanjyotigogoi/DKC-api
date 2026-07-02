<?php

namespace App\Filament\Resources\MagazineArticleResource\Pages;

use App\Filament\Resources\MagazineArticleResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMagazineArticles extends ListRecords
{
    protected static string $resource = MagazineArticleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

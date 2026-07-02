<?php

namespace App\Filament\Resources\MagazineIssueResource\Pages;

use App\Filament\Resources\MagazineIssueResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMagazineIssue extends EditRecord
{
    protected static string $resource = MagazineIssueResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

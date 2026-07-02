<?php

namespace App\Filament\Resources\MemberApplicationResource\Pages;

use App\Filament\Resources\MemberApplicationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMemberApplications extends ListRecords
{
    protected static string $resource = MemberApplicationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

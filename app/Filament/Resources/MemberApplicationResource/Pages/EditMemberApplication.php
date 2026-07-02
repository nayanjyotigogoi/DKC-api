<?php

namespace App\Filament\Resources\MemberApplicationResource\Pages;

use App\Filament\Resources\MemberApplicationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMemberApplication extends EditRecord
{
    protected static string $resource = MemberApplicationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

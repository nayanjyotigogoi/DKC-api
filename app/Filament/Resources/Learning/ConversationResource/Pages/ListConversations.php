<?php

namespace App\Filament\Resources\Learning\ConversationResource\Pages;

use App\Filament\Resources\Learning\ConversationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConversations extends ListRecords
{
    protected static string $resource = ConversationResource::class;

    protected function getActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}

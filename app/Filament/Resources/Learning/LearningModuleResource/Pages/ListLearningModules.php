<?php

namespace App\Filament\Resources\Learning\LearningModuleResource\Pages;

use App\Filament\Resources\Learning\LearningModuleResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLearningModules extends ListRecords
{
    protected static string $resource = LearningModuleResource::class;

    protected function getActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}

<?php

namespace App\Filament\Resources\Learning\LearningModuleResource\Pages;

use App\Filament\Resources\Learning\LearningModuleResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLearningModule extends EditRecord
{
    protected static string $resource = LearningModuleResource::class;

    protected function getActions(): array
    {
        return [Actions\DeleteAction::make()];
    }
}

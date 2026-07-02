<?php

namespace App\Filament\Resources\CourseInterestResource\Pages;

use App\Filament\Resources\CourseInterestResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCourseInterest extends ViewRecord
{
    protected static string $resource = CourseInterestResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

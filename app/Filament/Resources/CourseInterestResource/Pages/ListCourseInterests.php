<?php

namespace App\Filament\Resources\CourseInterestResource\Pages;

use App\Filament\Resources\CourseInterestResource;
use Filament\Resources\Pages\ListRecords;

class ListCourseInterests extends ListRecords
{
    protected static string $resource = CourseInterestResource::class;

    protected function getActions(): array
    {
        return [];
    }
}

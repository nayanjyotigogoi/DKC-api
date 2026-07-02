<?php

namespace App\Filament\Resources\GalleryPhotoResource\Pages;

use App\Filament\Resources\GalleryPhotoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGalleryPhoto extends EditRecord
{
    protected static string $resource = GalleryPhotoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

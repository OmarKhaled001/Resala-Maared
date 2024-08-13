<?php

namespace App\Filament\Resources\RatingvResource\Pages;

use App\Filament\Resources\RatingvResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRatingv extends EditRecord
{
    protected static string $resource = RatingvResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\RatingcResource\Pages;

use App\Filament\Resources\RatingcResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRatingc extends EditRecord
{
    protected static string $resource = RatingcResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

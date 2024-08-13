<?php

namespace App\Filament\Resources\RatingvResource\Pages;

use App\Filament\Resources\RatingvResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRatingvs extends ListRecords
{
    protected static string $resource = RatingvResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

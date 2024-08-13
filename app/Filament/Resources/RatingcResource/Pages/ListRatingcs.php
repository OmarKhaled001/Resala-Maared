<?php

namespace App\Filament\Resources\RatingcResource\Pages;

use App\Filament\Resources\RatingcResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRatingcs extends ListRecords
{
    protected static string $resource = RatingcResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

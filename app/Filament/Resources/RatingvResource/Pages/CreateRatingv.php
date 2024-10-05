<?php

namespace App\Filament\Resources\RatingvResource\Pages;

use App\Filament\Resources\RatingvResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRatingv extends CreateRecord
{
    protected static string $resource = RatingvResource::class;

    public function getTitle(): string 
    {
        return 'إضافة تقيم';
    }
    
}

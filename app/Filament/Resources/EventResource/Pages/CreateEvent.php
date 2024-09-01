<?php

namespace App\Filament\Resources\EventResource\Pages;

use Filament\Actions;
use Filament\Actions\CreateAction;
use App\Filament\Resources\EventResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;
    public function getTitle(): string 
    {
        return 'إضافة حدث';
    }
    
}

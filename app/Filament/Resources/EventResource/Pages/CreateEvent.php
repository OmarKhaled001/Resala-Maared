<?php

namespace App\Filament\Resources\EventResource\Pages;

use Carbon\Carbon;
use Filament\Actions;
use App\Models\Volunteer;
use App\Models\Contribution;
use Illuminate\Notifications\Action;
use App\Filament\Resources\EventResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;
        // Add custom actions

    
        // Handle post-creation logic
        protected function handleAfterCreate(Volunteer $record)
        {
            $volunteers = Volunteer::all();
            
            foreach ($volunteers as $volunteer) {
                if ($volunteer->events->isNotEmpty()) {
                    foreach ($volunteer->events as $event) {
                        $day = Carbon::create($event->date)->format('d');
                        $month = Carbon::create($event->date)->format('m');
                        $year = Carbon::create($event->date)->format('Y');
    
                        $contribution = Contribution::where('volunteer_id', $volunteer->id)
                            ->where('year', $year)
                            ->where('month', $month)
                            ->first();
    
                        if ($contribution) {
                            $contribution->$day = 1; // Update the specific day
                            $contribution->save();
                        } else {
                            $contribution = new Contribution;
                            $contribution->volunteer_id = $volunteer->id;
                            $contribution->year = $year;
                            $contribution->month = $month;
                            $contribution->$day = 1; // Set the specific day
                            $contribution->save();
                        }
                    }
                }
            }
        }
    
    
}

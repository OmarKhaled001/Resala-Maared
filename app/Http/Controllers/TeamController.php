<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\History;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function MasaolTeam() {
        $volunteers = Volunteer::all();
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $daysInMonth = Carbon::create($year, $month)->daysInMonth;
        foreach($volunteers as $volunteer){
            for ($day = 1; $day <= $daysInMonth; $day++) {
                $date = Carbon::create($year, $month, $day)->format('Y-m-d');
                    foreach($volunteer->events as $event){
                        $eventDate = $event->date;
                        if($eventDate == $date){ 
                             foreach($volunteer->histories as $history) {
                                if($history->date != $eventDate ){
                                    $history = new History();
                                    $history->date =  $date;
                                    $history->count =  1;
                                    $history->save();
                                    $volunteer->histories()->attach($history->id);
                                }

                             }
                        }
                        
                    }
            }
        }
        
        return view('vol.masaol',[
            'volunteers' => $volunteers,
        ]);

    }
}

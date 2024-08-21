<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\History;
use App\Models\Volunteer;
use App\Models\Contribution;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function MasaolTeam() {
        $volunteers = Volunteer::all();
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $daysInMonth = Carbon::create($year, $month)->daysInMonth;
     
        
        foreach( $volunteers as $volunteer){
            if($volunteer->events != null){
                foreach ($volunteer->events as $event) {
                        $day = Carbon::create($event->date)->format('d');
                        $month = Carbon::create($event->date)->format('m');
                        $year= Carbon::create($event->date)->format('Y');
                        $contribution = new Contribution;
                        $contribution->year = $year;
                        $contribution->month = $month;
                        $contribution->$day = 1;
                        $contribution->save();
                    }

                }
        }
    
        
        return view('vol.masaol',[
            'volunteers' => $volunteers,
        ]);

    }
}

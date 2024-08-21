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
                // get all contribution
                $total = 0;
                foreach ($volunteer->events as $event) {
                    $day = Carbon::create($event->date)->format('d');
                    $month = Carbon::create($event->date)->format('m');
                    $year= Carbon::create($event->date)->format('Y');
                    $contribution = Contribution::where('volunteer_id',$volunteer->id)
                    ->where('year', $year)
                    ->where('month', $month)
                    ->get()
                    ->first();
                    if($contribution != null){
                        $contribution->year = $year;
                        $contribution->month = $month;
                        $contribution->$day = 1;
                        return response($day);
                        $contribution->save();
                        $total += 1;
                    }else{
                        $contribution = new Contribution;
                        $contribution->volunteer_id =$volunteer->id;
                        $contribution->year = $year;
                        $contribution->month = $month;
                        $contribution->$day = 1;
                        $contribution->save();
                        $total += 1;
                    }
            
                    }

                    $contribution->total = $total;
                    $contribution->save();

                }
        }
    
        
        return view('vol.masaol',[
            'volunteers' => $volunteers,
        ]);

    }
}

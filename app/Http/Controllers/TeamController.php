<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\History;
use App\Models\Volunteer;
use App\Models\Contribution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                        $contribution->total = DB::raw('1' + '2' + '3' + '4' + '5' + '6' + '7' + '8' + '9' + '10' + '11' + '12' + '13' + '14' + '15' + '16' + '17' + '18' + '19' + '20' + '21' + '22' + '23' + '24' + '25' + '26' + '27' + '28' + '29' + '30'+ '31');
                        $contribution->save();
                    }else{
                        $contribution = new Contribution;
                        $contribution->volunteer_id =$volunteer->id;
                        $contribution->year = $year;
                        $contribution->month = $month;
                        $contribution->$day = 1;
                        $contribution->total = DB::raw('1' + '2' + '3' + '4' + '5' + '6' + '7' + '8' + '9' + '10' + '11' + '12' + '13' + '14' + '15' + '16' + '17' + '18' + '19' + '20' + '21' + '22' + '23' + '24' + '25' + '26' + '27' + '28' + '29' + '30'+ '31');
                        $contribution->save();
                    }
            
                    }


            }
        }
    
        
        return view('vol.masaol',[
            'volunteers' => $volunteers,
        ]);

    }
}

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
        $Month = Carbon::now()->month;
        $Year = Carbon::now()->year;
        $m = Carbon::create($Month)->format('m');
        $y= Carbon::create($Year)->format('Y');
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
                        $contribution->save();
                    }else{
                        $contribution = new Contribution;
                        $contribution->volunteer_id =$volunteer->id;
                        $contribution->year = $year;
                        $contribution->month = $month;
                        $contribution->$day = 1;
                        $contribution->save();
                    }
            
                    }


            }
        }
    
        
        return view('vol.masaol',[
            'contribution' => $contribution,
            'volunteers' => $volunteers,
            'm' => $m,
            'y' => $y,
        ]);

    }
}

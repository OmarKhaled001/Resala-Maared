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

        $currentYear = now()->year;
        $currentMonth = now()->month;

            
        $m = Carbon::create($currentMonth)->format('m');
        $y= Carbon::create($currentYear)->format('Y');

        $volunteers = Volunteer::with(['contributions' => function ($query) use ($currentYear, $currentMonth) {
            $query->where('year', $currentYear)->where('month', $currentMonth);
        }])->get();
       
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

    
 
        return view('event.contributions',[
            'volunteers' => $volunteers,
      
        ]);

    }
}

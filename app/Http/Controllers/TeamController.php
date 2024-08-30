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

        $volunteers = Volunteer::with(['contributions' => function ($query) use ($currentYear, $currentMonth) {
            $query->where('year', $currentYear)->where('month', $currentMonth);
        }])->get();
       
        foreach( $volunteers as $volunteer){
            $events = $volunteer->events;
                        if($events != null){
                // get all contribution
                foreach ($events as $event) {
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
                if (count($volunteer->contributions)>0){
                    $total = 0;
                    $contribution = $volunteer->contributions->first();
                    for ($i = 1; $i <= 31; $i++){
        
                        $day = str_pad($i, 2, '0', STR_PAD_LEFT);
                        if ($contribution->$day != null){
                           $total += 1; 
                        }
                    }
                    $contribution->total = $total; 
    
                    $contribution->save();
                }
            }else{
                $contribution = $volunteer->contributions->first();
                if ($contribution) {
                    $contribution->delete();
                }
                

            }


        }

            
 
        $volunteers = Volunteer::with(['contributions' => function ($query) use ($currentYear, $currentMonth) {
            $query->where('year', $currentYear)->where('month', $currentMonth);
        }])->where('status','مسئول')->get();
        
       
        
    
 
        return view('vol.masaol',[
            'volunteers' => $volunteers,
      
        ]);

    }
    public function MmasaolTeam() {


        $currentYear = now()->year;
        
        $currentMonth = now()->month;

        $volunteers = Volunteer::with(['contributions' => function ($query) use ($currentYear, $currentMonth) {
            $query->where('year', $currentYear)->where('month', $currentMonth);
        }])->get();
       
        foreach( $volunteers as $volunteer){
            $events = $volunteer->events;
                        if($events != null){
                // get all contribution
                foreach ($events as $event) {
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
                if (count($volunteer->contributions)>0){
                    $total = 0;
                    $contribution = $volunteer->contributions->first();
                    for ($i = 1; $i <= 31; $i++){
        
                        $day = str_pad($i, 2, '0', STR_PAD_LEFT);
                        if ($contribution->$day != null){
                           $total += 1; 
                        }
                    }
                    $contribution->total = $total; 
    
                    $contribution->save();
                }
            }else{
                $contribution = $volunteer->contributions->first();
                if ($contribution) {
                    $contribution->delete();
                }
                

            }


        }
 
        $volunteers = Volunteer::with(['contributions' => function ($query) use ($currentYear, $currentMonth) {
            $query->where('year', $currentYear)->where('month', $currentMonth);
        }])->where('status','مشروع مسئول')->get();
        
       
        
    
 
        return view('vol.mmasaol',[
            'volunteers' => $volunteers,
      
        ]);

    }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Volunteer;
use App\Models\Contribution;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $currentYear = now()->year;
        $currentMonth = now()->month;
        $volunteers = Volunteer::with(['contributions' => function ($query) use ($currentYear, $currentMonth) {
            $query->where('year', $currentYear)->where('month', $currentMonth);
        }])->get();
       
        foreach( $volunteers as $volunteer){
            $events = $volunteer->events->where('year', $currentYear)->where('month', $currentMonth);
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





        $masaolVolunteers = Volunteer::where('status','مسئول')->with(['contributions' => function ($query) use ($currentYear, $currentMonth) {
            $query->where('year', $currentYear)->where('month', $currentMonth);
        }])->get();
        $mtotalContributionsCount = 0;
        $mtotalSum = 0;

        foreach ($masaolVolunteers as $volunteer) {
            $contributions = $volunteer->contributions;
            $mtotalContributionsCount += $contributions->count();
            $mtotalSum += $contributions->sum('total');
        }

        $mmasaolVolunteers = Volunteer::where('status','مشروع مسئول')->with(['contributions' => function ($query) use ($currentYear, $currentMonth) {
            $query->where('year', $currentYear)->where('month', $currentMonth);
        }])->get();

        $mmtotalContributionsCount = 0;
        $mmtotalSum = 0;

        foreach ($mmasaolVolunteers as $volunteer) {
            $contributions = $volunteer->contributions;
            $mmtotalContributionsCount += $contributions->count();
            $mmtotalSum += $contributions->sum('total');
        }
      
        $contributions = Contribution::where('year', $currentYear)->where('month', $currentMonth)->get();

            
        return view('index',compact(
            'contributions',
            'masaolVolunteers',
            'mmasaolVolunteers',
            'mtotalContributionsCount',
            'mtotalSum',
            'mmtotalContributionsCount',
            'mmtotalSum',
        ));
    }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Volunteer;
use App\Models\Contribution;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EventController extends Controller
{

    public function eventsWeek1 ()
    {
        
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $week1Start = Carbon::create($currentYear, $currentMonth, 1)->startOfDay();
        $week1End = Carbon::create($currentYear, $currentMonth, 7)->endOfDay();

        $events = Event::whereBetween('date', [$week1Start, $week1End])->orderBy('date', 'asc')->get();


        
        return view('events.week',[
            'events' => $events,
        ]);
    }
    public function eventsWeek2 ()
    {
        
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $week2Start = Carbon::create($currentYear, $currentMonth, 8)->startOfDay();
        $week2End = Carbon::create($currentYear, $currentMonth, 14)->endOfDay();
        
        $events = Event::whereBetween('date', [$week2Start, $week2End])->orderBy('date', 'asc')->get();


        
        return view('events.week',[
            'events' => $events,
        ]);
    }
    public function eventsWeek3 ()
    {
        
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $week3Start = Carbon::create($currentYear, $currentMonth, 15)->startOfDay();
        $week3End = Carbon::create($currentYear, $currentMonth, 21)->endOfDay();

        $events = Event::whereBetween('date', [$week3Start, $week3End])->orderBy('date', 'asc')->get();


        
        return view('events.week',[
            'events' => $events,
        ]);
    }
    public function eventsWeek4 ()
    {
        
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $week4Start = Carbon::create($currentYear, $currentMonth, 22)->startOfDay();
        $week4End = Carbon::create($currentYear, $currentMonth, 28)->endOfDay();

        $events = Event::whereBetween('date', [$week4Start, $week4End])->orderBy('date', 'asc')->get();


        
        return view('events.week',[
            'events' => $events,
        ]);
    }
    public function eventsWeek5 ()
    {
        
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $week5Start = Carbon::create($currentYear, $currentMonth, 29)->startOfDay();
        $week5End = Carbon::create($currentYear, $currentMonth, Carbon::now()->endOfMonth()->day)->endOfDay();

        $events = Event::whereBetween('date', [$week5Start, $week5End])->orderBy('date', 'asc')->get();


        
        return view('events.week',[
            'events' => $events,
        ]);
    }
    public function eventsMeeting ()
    {
        
        $currentMonth = Carbon::now()->month;


        $events = Event::whereMonth('date', $currentMonth)
        ->whereNotNull('meeting_head')
        ->orderBy('date', 'asc')->get();

        return view('events.meeting',[
            'events' => $events,
        ]);
    }
    public function eventsMaared ()
    {
        
        $currentMonth = Carbon::now()->month;

        $events = Event::whereMonth('date', $currentMonth)
        ->whereType('معرض ملابس')
        ->orderBy('date', 'asc')->get();

        return view('events.maared',[
            'events' => $events,
        ]);
    }

    public function contribution() {

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
                $day1=01;
                $day2=02;
                $day3=03;
                $day4=04;
                $day5=05;
                $day6=06;
                $day7=07;
                $day8=08;
                $day9=09;
                $day10=10;
                $day11=11;
                $day12=12;
                $day13=13;
                $day14=14;
                $day15=15;
                $day16=16;
                $day17=17;
                $day18=18;
                $day19=19;
                $day20=20;
                $day21=21;
                $day22=22;
                $day23=23;
                $day24=24;
                $day25=25;
                $day26=26;
                $day27=27;
                $day28=28;
                $day29=29;
                $day30=30;
                $day31=31;


          
         
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
                        $contribution->$total = 
                        $contribution->$day1+
                        $contribution->$day2+
                        $contribution->$day3+
                        $contribution->$day4+
                        $contribution->$day5+
                        $contribution->$day6+
                        $contribution->$day7+
                        $contribution->$day8+
                        $contribution->$day9+
                        $contribution->$day10+
                        $contribution->$day11+
                        $contribution->$day12+
                        $contribution->$day13+
                        $contribution->$day14+
                        $contribution->$day15+
                        $contribution->$day16+
                        $contribution->$day17+
                        $contribution->$day18+
                        $contribution->$day19+
                        $contribution->$day20+
                        $contribution->$day21+
                        $contribution->$day22+
                        $contribution->$day23+
                        $contribution->$day24+
                        $contribution->$day25+
                        $contribution->$day26+
                        $contribution->$day27+
                        $contribution->$day28+
                        $contribution->$day29+
                        $contribution->$day30+
                        $contribution->$day31;

                        $contribution->total = $contribution->column1 + $contribution->column2 + $contribution->column3 ;
                        $contribution->save();
                    }else{
                        $contribution = new Contribution;
                        $contribution->volunteer_id =$volunteer->id;
                        $contribution->year = $year;
                        $contribution->month = $month;
                        $total+=1;
                        $contribution->total = $total;
                        $contribution->$day = 1;
                        $contribution->save();
            
                    }

                   
            
                }
              
             


            }
        }

    
 
        return view('events.contributions',[
            'volunteers' => $volunteers,
      
        ]);

    }



  
}

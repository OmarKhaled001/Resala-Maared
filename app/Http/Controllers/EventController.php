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
    public function eventsDriver ()
    {
        
        $currentMonth = Carbon::now()->month;


        $events = Event::whereMonth('date', $currentMonth)
        ->whereNotNull('driver_id')
        ->orderBy('date', 'asc')->get();

        return view('events.drivers',[
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


    
 
        return view('events.contributions',[
            'volunteers' => $volunteers,
      
        ]);

    }

    

  
}


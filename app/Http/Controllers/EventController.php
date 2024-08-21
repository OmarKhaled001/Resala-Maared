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
                $excludedColumns = ['id', 'total','year','month'];
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
                       // Calculate the sum of all columns except the excluded ones
                        $sum = $contribution->getAttributes(); // Get all attributes of the row
                        $sum = array_reduce(array_keys($sum), function($carry, $key) use ($sum, $excludedColumns) {
                            if (!in_array($key, $excludedColumns) && is_numeric($sum[$key])) {
                                $carry += $sum[$key];
                            }
                            return $carry;
                        }, 0);
                        
                        // Optionally, update the 'total' column with the sum
                        $contribution->total = $sum;
                       $contribution->save();
                    }else{
                        $contribution = new Contribution;
                        $contribution->volunteer_id =$volunteer->id;
                        $contribution->year = $year;
                        $contribution->month = $month;
                        $contribution->$day = 1;
                        $contribution->save();
                       // Calculate the sum of all columns except the excluded ones
                        $sum = $contribution->getAttributes(); // Get all attributes of the row
                        $sum = array_reduce(array_keys($sum), function($carry, $key) use ($sum, $excludedColumns) {
                            if (!in_array($key, $excludedColumns) && is_numeric($sum[$key])) {
                                $carry += $sum[$key];
                            }
                            return $carry;
                        }, 0);
                        
                        // Optionally, update the 'total' column with the sum
                        $contribution->total = $sum;
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

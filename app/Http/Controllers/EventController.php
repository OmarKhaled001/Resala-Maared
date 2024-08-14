<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EventController extends Controller
{

    public function eventsWeek1 (Request $request)
    {
        
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $week1Start = Carbon::create($currentYear, $currentMonth, 1)->startOfDay();
        $week1End = Carbon::create($currentYear, $currentMonth, 7)->endOfDay();

        $events = Event::whereBetween('date', [$week1Start, $week1End])->orderBy('date', 'asc')->get();


        
        return view('events.week1',[
            'events' => $events,
        ]);
    }
    public function eventsWeek2 (Request $request)
    {
        
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $week2Start = Carbon::create($currentYear, $currentMonth, 8)->startOfDay();
        $week2End = Carbon::create($currentYear, $currentMonth, 14)->endOfDay();
        
        $events = Event::whereBetween('date', [$week2Start, $week2End])->orderBy('date', 'asc')->get();


        
        return view('events.week1',[
            'events' => $events,
        ]);
    }
    public function eventsWeek3 (Request $request)
    {
        
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $week3Start = Carbon::create($currentYear, $currentMonth, 15)->startOfDay();
        $week3End = Carbon::create($currentYear, $currentMonth, 21)->endOfDay();

        $events = Event::whereBetween('date', [$week3Start, $week3End])->orderBy('date', 'asc')->get();


        
        return view('events.week1',[
            'events' => $events,
        ]);
    }
    public function eventsWeek4 (Request $request)
    {
        
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $week4Start = Carbon::create($currentYear, $currentMonth, 22)->startOfDay();
        $week4End = Carbon::create($currentYear, $currentMonth, 28)->endOfDay();

        $events = Event::whereBetween('date', [$week4Start, $week4End])->orderBy('date', 'asc')->get();


        
        return view('events.week1',[
            'events' => $events,
        ]);
    }
    public function eventsWeek5 (Request $request)
    {
        
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $week5Start = Carbon::create($currentYear, $currentMonth, 29)->startOfDay();
        $week5End = Carbon::create($currentYear, $currentMonth, Carbon::now()->endOfMonth()->day)->endOfDay();

        $events = Event::whereBetween('date', [$week5Start, $week5End])->orderBy('date', 'asc')->get();


        
        return view('events.week1',[
            'events' => $events,
        ]);
    }



    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Event $Event)
    {
        //
    }


    public function edit(Event $Event)
    {
        //
    }


    public function update(Request $request, Event $Event)
    {
        //
    }


    public function destroy(Event $Event)
    {
        //
    }
}

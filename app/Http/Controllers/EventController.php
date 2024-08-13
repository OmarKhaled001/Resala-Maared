<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EventController extends Controller
{

    public function allevents(Request $request)
    {
        
        $currentMonth = Carbon::now()->month;
        $events = Event::orderBy('date', 'asc')->whereMonth('date', $currentMonth)->get();
        $volunteers = Volunteer::all();

        
        return view('events.all',[
            'events' => $events,
            'volunteers' => $volunteers
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

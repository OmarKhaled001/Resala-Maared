<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
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
        $masaolVolunteers = Volunteer::where('status','مسئول')->with('contributions')->get();
        $mmasaolVolunteers = Volunteer::where('status','مسئول')->with('contributions')->get();
       
        return view('index',compact('masaolVolunteers','mmasaolVolunteers'));
    }
}

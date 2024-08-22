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
        $currentYear = now()->year;
        $currentMonth = now()->month;
        $masaolVolunteers = Volunteer::where('status','مسئول')->with(['contributions' => function ($query) use ($currentYear, $currentMonth) {
            $query->where('year', $currentYear)->where('month', $currentMonth);
        }])->get();
        $mmasaolVolunteers = Volunteer::where('status','مشروع مسئول')->with(['contributions' => function ($query) use ($currentYear, $currentMonth) {
            $query->where('year', $currentYear)->where('month', $currentMonth);
        }])->get();

        return view('index',compact('masaolVolunteers','mmasaolVolunteers'));
    }
}

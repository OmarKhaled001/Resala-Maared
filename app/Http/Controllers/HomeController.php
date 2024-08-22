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
      

            
        return view('index',compact(
            'masaolVolunteers',
            'mmasaolVolunteers',
            'mtotalContributionsCount',
            'mtotalSum',
            'mmtotalContributionsCount',
            'mmtotalSum',
        ));
    }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\History;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function MasaolTeam() {
        $volunteers = Volunteer::all();
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $daysInMonth = Carbon::create($year, $month)->daysInMonth;
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $d = Carbon::create($year, $month, $day)->format('d');
            $m = Carbon::create($year, $month, $day)->format('m');
            $y = Carbon::create($year, $month, $day)->format('Y');
            if($d == 1){
                return response($d);

            }
            return response([$y,$m,$d]);

        }
        
        return view('vol.masaol',[
            'volunteers' => $volunteers,
        ]);

    }
}

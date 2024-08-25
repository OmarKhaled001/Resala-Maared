<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\History;
use App\Models\Volunteer;
use App\Models\Contribution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    public function MasaolTeam() {

        $currentYear = now()->year;
        $currentMonth = now()->month;

            
 
        $volunteers = Volunteer::with(['contributions' => function ($query) use ($currentYear, $currentMonth) {
            $query->where('year', $currentYear)->where('month', $currentMonth);
        }])->where('status','مسئول')->get();
        
       
        
    
 
        return view('event.contributions',[
            'volunteers' => $volunteers,
      
        ]);

    }
}

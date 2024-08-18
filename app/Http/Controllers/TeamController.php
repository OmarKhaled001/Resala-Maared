<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function MasaolTeam() {
        $volunteers = Volunteer::whereStatus('مسئول')->get();
        return view('vol.masaol',[
            'volunteers' => $volunteers,
        ]);

    }
}

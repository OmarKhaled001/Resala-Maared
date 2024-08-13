<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;
use App\DataTables\VolunteersDataTable;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Contracts\DataTable;
;

class VolunteerController extends Controller
{

    public function allVolunteers()
    {        
        return view('volunteers.all');
    }

    public function addVolunteers()
    {
        return view('volunteers.add');
    }

    public function ashbalVolunteers()
    {
        $volunteers = Volunteer::where('status','شبل')->get();
        return view('volunteers.ashbal',['volunteers'=>$volunteers]);
    }

    public function motabaaVolunteers()
    {
        $volunteers = Volunteer::where('status','داخل المتابعة')->get();
        return view('volunteers.motabaa',['volunteers'=>$volunteers]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Volunteer $volunteer)
    {
        //
    }


    public function edit(Volunteer $volunteer)
    {
        //
    }


    public function update(Request $request, Volunteer $volunteer)
    {
        //
    }


    public function destroy(Volunteer $volunteer)
    {
        //
    }
}

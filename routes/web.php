<?php

use App\Livewire\AllVol;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\EventController;
use App\Http\Controllers\VolunteerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {return Redirect::to(Request::url().'/admin');})->name('home');
Route::group(['middleware' => ['admin']],function () {
    Route::get('/', function () {return view('index');});
    
    // //Volunteers
    Route::get('master/volunteer/all' ,[VolunteerController::class,'allVolunteers'])->name('volunteers');
    Route::get('master/volunteer/add' ,[VolunteerController::class,'addVolunteers'])->name('addVol');

    
    // //Events
    Route::get('/events/all' ,[EventController::class,'allevents'])->name('events');
});



Auth::routes();


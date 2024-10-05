<?php

use App\Livewire\AllVol;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
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
Route::group(['middleware' => ['admin','auth']],function () {
    

    
    Route::get('master' ,[HomeController::class,'index'])->name('home');
    // //Events
    Route::get('master/events/week1'         ,[EventController::class,'eventsWeek1'])->name('events.week1');
    Route::get('master/events/week2'         ,[EventController::class,'eventsWeek2'])->name('events.week2');
    Route::get('master/events/week3'         ,[EventController::class,'eventsWeek3'])->name('events.week3');
    Route::get('master/events/week4'         ,[EventController::class,'eventsWeek4'])->name('events.week4');
    Route::get('master/events/week5'         ,[EventController::class,'eventsWeek5'])->name('events.week5');
    Route::get('master/events/contributions' ,[EventController::class,'contribution'])->name('events.contribution');
    Route::get('master/events/meetings' ,[EventController::class,'eventsMeeting'])->name('events.meeting');
    Route::get('master/events/maared' ,[EventController::class,'eventsMaared'])->name('events.maared');
    Route::get('master/events/etaam' ,[EventController::class,'eventsEtaam'])->name('events.etaam');
    Route::get('master/events/driver' ,[EventController::class,'eventsDriver'])->name('events.driver');
    Route::get('master/vol/masaol' ,[TeamController::class,'MasaolTeam'])->name('team.masaol');
    Route::get('master/vol/mmasaol' ,[TeamController::class,'MmasaolTeam'])->name('team.mmasaol');
    Route::get('master/vol/new' ,[TeamController::class,'new'])->name('team.new');
    Route::get('master/vol/birthdate' ,[TeamController::class,'birthdate'])->name('team.birthdate');
});



Auth::routes();


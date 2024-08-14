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
Route::group(['middleware' => ['admin','auth']],function () {
    

    
    // //Events
    Route::get('master/events/week1' ,[EventController::class,'eventsWeek1'])->name('events.week1');
    Route::get('master/events/week2' ,[EventController::class,'eventsWeek2'])->name('events.week2');
    Route::get('master/events/week3' ,[EventController::class,'eventsWeek3'])->name('events.week3');
    Route::get('master/events/week4' ,[EventController::class,'eventsWeek4'])->name('events.week4');
    Route::get('master/events/week5' ,[EventController::class,'eventsWeek5'])->name('events.week5');
    Route::get('master/events/meetings' ,[EventController::class,'eventsMeeting'])->name('events.meeting');
    Route::get('master/events/maared' ,[EventController::class,'eventsMaared'])->name('events.maared');
    Route::get('master/events/etaam' ,[EventController::class,'eventsEtaam'])->name('events.etaam');
});



Auth::routes();


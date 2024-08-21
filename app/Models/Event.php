<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Volunteer;
use App\Models\Contribution;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Event extends Model implements HasMedia
{
    use HasFactory,LogsActivity,InteractsWithMedia ;

    protected $guarded = [];

    public function volunteers()
    { 
        return $this->belongsToMany(Volunteer::class ,'event_volunteer')->withTimestamps(); 
    }

    public function driver()
    { 
        return $this->belongsTo(Driver::class); 
    }
    
    public function place()
    { 
        return $this->belongsTo(Place::class); 
    }

    public function category()
    { 
        return $this->belongsTo(Category::class); 
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

// Register model event listeners
protected static function boot()
{
    parent::boot();

    static::created(function ($event) {
        // Get all volunteers
        $volunteers = Volunteer::all();
    
        foreach ($volunteers as $volunteer) {
            if ($volunteer->events->isNotEmpty()) {
                foreach ($volunteer->events as $event) {
                    $day = Carbon::create($event->date)->format('d');
                    $month = Carbon::create($event->date)->format('m');
                    $year = Carbon::create($event->date)->format('Y');

                    $contribution = Contribution::where('volunteer_id', $volunteer->id)
                        ->where('year', $year)
                        ->where('month', $month)
                        ->first();

                    if ($contribution) {
                        $contribution->$day = 1; // Update the specific day
                        $contribution->save();
                    } else {
                        $contribution = new Contribution;
                        $contribution->volunteer_id = $volunteer->id;
                        $contribution->year = $year;
                        $contribution->month = $month;
                        $contribution->$day = 1; // Set the specific day
                        $contribution->save();
                    }
                }
            }
        }
    });
}


}

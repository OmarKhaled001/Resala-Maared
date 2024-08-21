<?php

namespace App\Models;

use Carbon\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Volunteer extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia ,LogsActivity;

    protected $guarded = [];

    protected $appends = ['age'];
    
    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['birthdate'])->age;
    }

    public function events( ){ 

        return $this->belongsToMany(Event::class ,'event_volunteer')->withTimestamps(); 
    }

    public function histories( ){ 

        return $this->belongsToMany(History::class ,'volunteer_history')->withTimestamps(); 
    }

    public function categories( ){ 

        return $this->belongsToMany(Category::class ,'volunteer_category')->withTimestamps(); 
    }

    
    public function ratingvs(){

        return $this->hasMany(Ratingv::class ); 

        
    }
    
    public function contributions(){

        return $this->hasMany(Contribution::class ); 

        
    }
    

    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
}

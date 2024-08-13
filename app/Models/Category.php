<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory ,LogsActivity;
    protected $guarded = [];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function volunteers()
    { 
        return $this->belongsToMany(Volunteer::class ,'volunteer_category')->withTimestamps(); 
    }

    public function ratingcs(){

        return $this->hasMany(Ratingc::class)->withTimestamps(); 
        
    }
    public function events( ){ 

        return $this->hasMany(Event::class); 
    }
    
}

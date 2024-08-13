<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class History extends Model
{
    use HasFactory ,LogsActivity;
    
    protected $guarded = [];


    public function volunteers( ){ 

        return $this->belongsToMany(Volunteer::class ,'volunteer_history')->withTimestamps(); 
    }


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
}

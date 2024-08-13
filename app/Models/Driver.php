<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends Model implements HasMedia
{
    use HasFactory ,LogsActivity,InteractsWithMedia;
    
    protected $guarded = [];

    public function events( ){ 

        return $this->hasMany(Event::class); 
    }
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
}

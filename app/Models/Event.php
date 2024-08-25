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

   

}

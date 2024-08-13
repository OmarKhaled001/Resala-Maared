<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ratingv extends Model
{
    use HasFactory ,LogsActivity;

    protected $guarded = [];

    
    public function getActivitylogOptions(): LogOptions
    {

        return LogOptions::defaults();

    }


    public function volunteer(){

        return $this->belongsTo(Volunteer::class); 
        
    }
}

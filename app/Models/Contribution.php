<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contribution extends Model
{
  
    use HasFactory ,LogsActivity;
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
    protected $guarded = [];

    
    public function volunteer(){

        return $this->belongsTo(Volunteer::class); 
        
    }

    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'user_id',
        'trainer_id'
    ];

    /**
     * Get the USER record associated with the ROUTINE
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the TRAINER record associated with the ROUTINE
     */
    public function trainer()
    {
        return $this->belongsTo('App\Models\Trainer');
    }

    /**
     * Get the ROUTINEDETAILS records associated with the ROUTINE
     */
    public function routineDetails()
    {
        return $this->belongsTo('App\Models\RoutineDetail');
        // return $this->belongsTo('App\Models\RoutineDetail', 'routines_id');
    }

    /**
     * Get the EXCERCISE records associated with the ROUTINE
     */
    public function excercises()
    {
        return $this->belongsToMany('App\Models\Excercise');
    }
}

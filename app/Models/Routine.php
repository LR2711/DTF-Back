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
        // return $this->belongsTo(User::class);
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the TRAINER record associated with the ROUTINE
     */
    public function trainer()
    {
        // return $this->belongsTo(Trainer::class);
        return $this->belongsTo('App\Models\Trainer');
    }

    /**
     * Get the ROUTINEDETAILS records associated with the ROUTINE
     */
    public function routineDetails()
    {
        return $this->hasMany(RoutineDetail::class);
    }

    /**
     * Get the EXCERCISE records associated with the ROUTINE
     */
    public function excercises()
    {
        return $this->belongsToMany(Excercise::class);
    }
}

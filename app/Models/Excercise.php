<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excercise extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the ROUTINEDETAIL records associated with the EXCERCISE
     */
    public function routineDetails()
    {
        return $this->hasMany(RoutineDetail::class);
    }

    /**
     * Get the ROUTINE records associated with the EXCERCISE
     */
    public function routines()
    {
        return $this->belongsToMany(Routine::class);
    }
}

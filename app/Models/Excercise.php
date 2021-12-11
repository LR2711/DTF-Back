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
     * Get the ROUTINEDETAIL record associated with the EXCERCISE
     */
    public function routinedetail()
    {
        return $this->belongsTo(RoutineDetail::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoutineDetail extends Model
{
    use HasFactory;

    /**
     * Get the ROUTINE record associated with the ROUTINEDETAIL
     */
    public function routine()
    {
        return $this->belongsTo(Routine::class);
    }

    /**
     * Get the EXCERCISE record associated with the ROUTINEDETAIL
     */
    public function excercise()
    {
        return $this->belongsTo(Excercise::class);
    }
}

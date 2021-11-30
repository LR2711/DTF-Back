<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DietDetail extends Model
{
    use HasFactory;

    /**
     * Get the DIET record associated with the DIETDETAIL
     */
    public function diet()
    {
        return $this->belongsTo(Diet::class);
    }

    /**
     * Get the MEAL record associated with the DIETDETAIL
     */
    public function excercise()
    {
        return $this->belongsTo(Meal::class);
    }
}

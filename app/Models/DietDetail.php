<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DietDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'quantity',
        'time',
        'day',
        'comment',
        'meals_id',
        'diets_id',
    ];

    /**
     * Get the DIET record associated with the DIETDETAIL
     */
    public function diet()
    {
        return $this->hasOne(Diet::class);
    }

    /**
     * Get the MEAL record associated with the DIETDETAIL
     */
    public function meal()
    {
        return $this->hasOne(Meal::class);
    }
}

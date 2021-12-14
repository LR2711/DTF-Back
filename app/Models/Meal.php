<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * Get the DIETDETAIL record associated with the MEAL
     */
    public function dietdetail()
    {
        return $this->hasMany('App\Models\DietDetail');
    }

    /**
     * Get the DIET records associated with the MEAL
     */
    public function diets()
    {
        return $this->belongsToMany('App\Models\Diet');
    }
}

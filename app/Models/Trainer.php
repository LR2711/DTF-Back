<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'password'
    ];

    /**
     * Get the ROUTINE records associated with the TRAINER
     */
    public function routines()
    {
        // return $this->hasMany(Routine::class);
        return $this->hasMany('App\Models\Routine');
    }

    /**
     * Get the DIET records associated with the TRAINER
     */
    public function diets()
    {
        return $this->hasMany(Diet::class);
    }
}

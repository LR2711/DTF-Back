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
     * Get the ROUTIEN record associated with the DIET
     */
    public function routines() {
        return $this->belongsToMany(Routine::class);
    }

	/**
     * Get the DIET record associated with the USER
     */
    public function diet() {
        return $this->belongsToMany(Diet::class);
    }
}

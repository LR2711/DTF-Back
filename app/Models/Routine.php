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
        return $this->hasOne(User::class);
    }

    /**
     * Get the TRAINER record associated with the ROUTINE
     */
    public function trainer()
    {
        return $this->hasOne(Trainer::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    use HasFactory;

    /**
     * Get the USER record associated with the DIET
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the TRAINER record associated with the DIET
     */
    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}

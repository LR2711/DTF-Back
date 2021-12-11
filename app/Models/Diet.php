<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'start_date',
        'end_date',
        'user_id',
        'trainer_id',
    ];

    /**
     * Get the USER record associated with the DIET
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }

    /**
     * Get the TRAINER record associated with the DIET
     */
    public function trainer()
    {
        return $this->hasOne(Trainer::class);
    }
}

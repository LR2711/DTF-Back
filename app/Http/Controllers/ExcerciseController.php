<?php

namespace App\Http\Controllers;

use App\Models\Excercise;
use Illuminate\Http\Request;

class ExcerciseController extends Controller
{
    public function showExcercise(Excercise $excercise)
    {
        // $excercise = Excercise::find($excercise->ide);
        // $excercise->routines;
        // return json_encode($excercise);
        $excercise = Excercise::find($excercise->ide);
        foreach ($excercise->routines as $routines) {
            $routines->user;
        }
        return json_encode($excercise);
    }
}

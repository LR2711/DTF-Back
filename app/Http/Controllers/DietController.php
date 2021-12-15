<?php

namespace App\Http\Controllers;

use App\Models\Diet;
use Illuminate\Http\Request;

class DietController extends Controller
{
    public function showUserDietDetail($diet_id)
    {
        $diet_detail = Diet
            ::join("diet_details", "diet_details.diets_id", "=", "diets.id")
            ->join("meals", "meals.id", "=", "diet_details.meals_id")
            ->where("diet_details.diets_id", "=", $diet_id)
            ->select("diet_details.*", "meals.*")
            ->orderBy("diet_details.day", "ASC")
            // ->orderBy("diet_details.kind_food", "ASC")
            ->get();
        return response()->json([
            'success' => true,
            'diet_detail' => $diet_detail
        ]);
    }
}

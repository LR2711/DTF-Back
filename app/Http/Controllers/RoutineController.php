<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoutineController extends Controller
{
    public function store(Request $request)
    {
        $variableJson = null;

        $validator = Validator::make($request->all(), [
            'start_date' => 'required',
            'end_date' => 'required',
            'user_id' => 'required',
            'trainer_id' => 'required'
        ]);

        if ($validator->fails()) {
            $variableJson = response()->json([
                'success' => false,
                'message' => 'Error',
                'validator' => $validator->errors()
            ]);
        } else {
            $routine = new Routine();
            $routine->start_date = $request->post('start_date');
            $routine->end_date = $request->post('end_date');
            $routine->user_id = $request->post('user_id');
            $routine->trainer_id = $request->post('trainer_id');

            if ($routine->save()) {
                $variableJson = response()->json([
                    'success' => true,
                    'message' => 'Success',
                ]);
            } else {
                $variableJson = response()->json([
                    'success' => false,
                    'message' => 'Fail',
                ]);
            }
        }
        return json_encode($variableJson);
    }

    public function showUserRoutineDetail($routine_id)
    {
        $routine = Routine::find($routine_id);
        $routine_detail = $routine->routineDetails()->where('routines_id', $routine_id)->orderBy('day', 'ASC')->get();
        return response()->json([
            'success' => 'SIU',
            'routine' => $routine,
            'routine_detail' => $routine_detail
        ]);
    }

    public function showUserRoutineDetail2($routine_id)
    {
        $routine_detail = Routine::where('routine_details.user_id', $routine_id)->orderBy('day', 'ASC')->get();
        return json_encode($routine_detail);
    }
}

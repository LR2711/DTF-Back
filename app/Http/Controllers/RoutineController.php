<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class RoutinesController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            $routine->star_date = $request->post('star_date');
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

        return $variableJson;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }
    public function showRoutine(Routine $routine)
    {
        $routine = Routine::find($routine->id);
        $routine->excercises;
        return json_encode($routine);
    }
    public function showUser(Routine $routine)
    {
        $routine = Routine::find($routine->id)->user;
        $routine->user;
        return json_encode($routine);
    }
    public function showUserRoutineB(Routine $routine)
    {
        // $routine = User::where(['user_id' => $user])->get();
        $routine = Routine::find($routine);
        return $routine;
    }

    
}

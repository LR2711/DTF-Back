<?php

namespace App\Http\Controllers;

use App\Models\Excercise;
use Illuminate\Http\Request;

class ExcerciseController extends Controller
{

    public function index()
    {
        // return Excercise::all();
        // return Excercise::lastest()->paginate(5);
        $excercises = Excercise::get();
        return view('excercise.index')->with('excercises', $excercises);
    }

    public function create()
    {
        return view('excercise.create');
    }

    public function store(Request $request)
    {
        // $request->validate(([
        //     'nameE' => 'required'
        // ]));

        Excercise::create($request->all());

        // return redirect()->route('excercise.index')
        //     ->with('success', 'Ejercicio creado satisfactoriamente');

        $excercice = new Excercise();
        $excercice->nameE = $request->input('nombre');

        $excercice->save();

        return redirect()->route('excercise.index');

    }

    public function show(Excercise $excercice)
    {
        return $excercice;
    }

    public function edit($id)
    {
        $excercice = Excercise::find($id);
        return view('excercise.edit')->with('excercise', $excercice);
    }

    // public function update(Request $request, Excercise $excercice)
    // {
    //     $excercice->update($request->all());
    //     return response()->json($excercice, 200);
    // }

    public function update(Request $request, $id)
    {
        $excercise = Excercise::find($id);
        $excercise->nameE = $request->input('nombre');
        $excercise->save();
        return redirect()->route('excercise.index');
    }

    public function delete(Excercise $excercice)
    {
        $excercice->delete();

        return response()->json(null, 204);
    }
    public function destroy($id)
    {
        Excercise::destroy($id);
        return redirect()->route('excercise.index');
    }
}

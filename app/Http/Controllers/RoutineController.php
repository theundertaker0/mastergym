<?php

namespace App\Http\Controllers;

use App\Models\Muscle;
use App\Models\Routine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //
        $routines = Routine::all();
        return view('admin.routines.index', compact('routines', $routines));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $muscles = Muscle::with('exercises')->get();
        return view('admin.routines.create', compact('muscles', $muscles));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            ['name'=> 'required|max:200'],
            ['name.required'=> 'El nombre de la rutina es obligatorio']
        );

        //Guardamos
        try{
            DB::transaction(function() use ($request){
                $routine = new Routine();
                $routine->name = $request->name;
                $routine->description = $request->description;
                $routine->save();
                foreach($request->routineExercises as $e)
                {
                    $routine->exercises()->sync([$e=>['series' => $request->{'series-'.$e}?$request->{'series-'.$e}:null, 'repetitions' => $request->{'reps-'.$e}?$request->{'reps-'.$e}:null]]);
                }
            });
        }catch (\Exception $err) {
            dd($err,$request);
            return redirect()->route('admin.routines.index')->with('message', 'Problemas al guardar en base de datos');
        }
        return redirect()->route('admin.routines.index')->with('message', 'Rutina guardada con éxito');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Routine  $routine
     * @return \Illuminate\Http\Response
     */
    public function show(Routine $routine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Routine  $routine
     * @return \Illuminate\Http\Response
     */
    public function edit(Routine $routine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Routine  $routine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Routine $routine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Routine  $routine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Routine $routine)
    {
        //
    }
}

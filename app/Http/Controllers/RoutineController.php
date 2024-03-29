<?php

namespace App\Http\Controllers;

use App\Models\Muscle;
use App\Models\Routine;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Array_;

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
            ['name'=> 'required|max:400'],
            ['name.required'=> 'El nombre de la rutina es obligatorio']
        );

        //Guardamos
        try{
            DB::transaction(function() use ($request){
                $routine = new Routine();
                $routine->name = $request->name;
                $routine->description = $request->description;
                $routine->save();
                if($request->routineExercises) {
                    foreach ($request->routineExercises as $e) {
                        $routine->exercises()->attach([$e => ['series' => $request->{'series-' . $e} ? $request->{'series-' . $e} : null, 'repetitions' => $request->{'reps-' . $e} ? $request->{'reps-' . $e} : null]]);
                    }
                }
            });
        }catch (\Exception $err) {
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
        $exercises = $routine->exercises()->get();
        //dd($exercises);
        return view('admin.routines.show', with(['routine' => $routine, 'exercises' => $exercises]));
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
        $muscles = Muscle::with('exercises')->get();
        $exercises = $routine->exercises()->get();
        //$h = $exercises->collect()->where('id', 3)->toArray();
        //dd($h);
        $e = array();
        foreach ($exercises as $ex) {
            array_push($e, $ex->id);
        }
        return view('admin.routines.edit', with(['routine' => $routine, 'muscles' => $muscles, 'exercises' => $exercises, 'er' => $e]));

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
        $request->validate(
            ['name'=> 'required|max:400'],
            ['name.required'=> 'El nombre de la rutina es obligatorio']
        );

        //Guardamos
        try{
            DB::transaction(function() use ($request, $routine){
                $routine->name = $request->name;
                $routine->description = $request->description;
                $routine->update();
                $sync = array();
                if($request->routineExercises) {
                    foreach ($request->routineExercises as $e) {
                        $sync[$e] = ['series' => $request->{'series-' . $e} ? $request->{'series-' . $e} : null, 'repetitions' => $request->{'reps-' . $e} ? $request->{'reps-' . $e} : null];

                    }
                    //dd($sync);
                    $routine->exercises()->sync($sync);
                }
            });
        }catch (\Exception $err) {
            //dd($err);
            return redirect()->route('admin.routines.index')->with('message', 'Problemas al guardar en base de datos');
        }
        return redirect()->route('admin.routines.index')->with('message', 'Rutina guardada con éxito');


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
        $routine->exercises()->detach();
        $routine->delete();
        return redirect()->route('admin.routines.index')->with('message', 'Rutina Eliminada con éxito');
    }

    public function download($id)
    {
        $input = array();
        $routine = Routine::find($id);
        $exercises = $routine->exercises()->get();
        $input['routine'] = $routine;
        $input['exercises'] = $exercises;
        $pdf = PDF::loadView('admin.routines.show',$input)->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download($routine->name.'.pdf');
    }
}

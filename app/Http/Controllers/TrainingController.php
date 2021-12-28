<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $trainings = Training::all();
        return view('admin.trainings.index',with(['trainings'=>$trainings]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $routines = Routine::all();
        return view('admin.trainings.create', with(['routines' => $routines]));
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
        //
        $request->validate(
            ['name'=> 'required|max:400'],
            ['name.required'=> 'El nombre del entrenamiento es obligatorio']
        );

        //Guardamos
        try{
            DB::transaction(function() use ($request){

                $training = new Training();
                $training->name = $request->name;
                $training->description = $request->description;
                $training->save();
                if($request->trainingRoutines) {
                   $training->routines()->attach($request->trainingRoutines);
                }
            });
        }catch (\Exception $err) {
            return redirect()->route('admin.trainings.index')->with('message', 'Problemas al guardar en base de datos');
        }
        return redirect()->route('admin.trainings.index')->with('message', 'Plan de entrenamiento guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        //
        $routines = $training->routines()->get();
        //dd($exercises);
        return view('admin.trainings.show', with(['training' => $training, 'routines' => $routines]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        //
        $routines = Routine::all();
        $rou = $training->routines()->get();
        $r = array();
        foreach ($rou as $ro) {
            array_push($r, $ro->id);
        }
        return view('admin.trainings.edit', with(['training'=> $training, 'routines' => $routines, 'ro' => $r]));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Training $training)
    {
        //
        //
        $request->validate(
            ['name'=> 'required|max:400'],
            ['name.required'=> 'El nombre del plan de entrenamiento es obligatorio']
        );

        //Guardamos
        try{
            DB::transaction(function() use ($request, $training){
                $training->name = $request->name;
                $training->description = $request->description;
                $training->update();

                if($request->trainingRoutines) {

                    $training->routines()->sync($request->trainingRoutines);
                }
                else{
                    $training->routines()->detach();
                }
            });
        }catch (\Exception $err) {
            //dd($err);
            return redirect()->route('admin.trainings.index')->with('message', 'Problemas al guardar en base de datos');
        }
        return redirect()->route('admin.trainings.index')->with('message', 'Plan de entrenamiento guardado con éxito');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy(Training $training)
    {
        //
        $training->routines()->detach();
        $training->delete();
        return redirect()->route('admin.trainings.index')->with('message', 'Plan de entrenamiento Eliminado con éxito');
    }
}

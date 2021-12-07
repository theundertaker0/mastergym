<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Muscle;
use Cohensive\Embed\Embed;
use Illuminate\Http\Request;
use Merujan99\LaravelVideoEmbed\Facades\LaravelVideoEmbed;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $exercises = Exercise::all();
        return view('admin.exercises.index', compact('exercises', $exercises));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $muscles = Muscle::all()->sortBy("name");
        return view('admin.exercises.create', compact('muscles', $muscles));
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
        $request->validate([
            'name'=> 'required|max:200',
            'img'=> 'image|mimes:jpg,png,jpeg|max:2048',
            'video' => 'max:200',
            'muscle_id'=> 'required'
        ], ['name.required'=> 'El nombre del ejercicio es obligatorio']);

        $input = $request->all();
        if($img = $request->file('img')){
            $destino = 'exercises/img';
            $nombre = date('YmdHis').".".$img->getClientOriginalExtension();

            $img->move($destino, $nombre);
            $input['img'] = $nombre;
        }

        Exercise::create($input);
        return redirect()->route('admin.exercises.index')->with('message', 'Ejercicio guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function show(Exercise $exercise)
    {
        //
        $muscle = $exercise->muscle;
        $attributes = [

            'class' => 'iframe-class',
            'data-html5-parameter' => true
        ];
        $video = LaravelVideoEmbed::parse($exercise->video);
        return view('admin.exercises.show', with(['exercise' => $exercise, 'muscle' => $muscle, 'video' => $video]));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function edit(Exercise $exercise)
    {
        //
        $muscles = Muscle::all()->sortBy("name");
        return view('admin.exercises.edit', with(['exercise' => $exercise, 'muscles' => $muscles]));
        //return view('admin.exercises.edit', compact(['exercise' => $exercise, 'muscles' => $muscles]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exercise $exercise)
    {
        //
        //
        $request->validate([
            'name'=> 'required|max:200',
            'img'=> 'image|mimes:jpg,png,jpeg|max:2048',
            'video' => 'max:200',
            'muscle_id'=> 'required'
        ]);

        $input = $request->all();
        if($img = $request->file('img')){
            $destino = 'exercises/img';
            $nombre = date('YmdHis').".".$img->getClientOriginalExtension();

            $img->move($destino, $nombre);
            $input['img'] = $nombre;
        } else {
            unset($input['img']);
        }
        $exercise->update($input);
        return redirect()->route('admin.exercises.index')->with('message', 'Ejercicio modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exercise $exercise)
    {
        //
        $exercise->delete();
        return redirect()->route('admin.exercises.index')->with('message', 'Ejercicio Eliminado con éxito');
    }
}

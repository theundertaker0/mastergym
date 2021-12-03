<?php

namespace App\Http\Controllers;

use App\Models\muscle;
use Illuminate\Http\Request;

class MuscleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $muscles = Muscle::all();
        return view('muscles.index', compact('muscles', $muscles));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\muscle  $muscle
     * @return \Illuminate\Http\Response
     */
    public function show(muscle $muscle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\muscle  $muscle
     * @return \Illuminate\Http\Response
     */
    public function edit(muscle $muscle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\muscle  $muscle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, muscle $muscle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\muscle  $muscle
     * @return \Illuminate\Http\Response
     */
    public function destroy(muscle $muscle)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Currier;
use Illuminate\Http\Request;

class CurrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('currier.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('currier.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $currier = new Currier($request->all());
        $currier->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Currier  $currier
     * @return \Illuminate\Http\Response
     */
    public function show(Currier $currier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Currier  $currier
     * @return \Illuminate\Http\Response
     */
    public function edit(Currier $currier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Currier  $currier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Currier $currier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Currier  $currier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currier $currier)
    {
        //
    }
}

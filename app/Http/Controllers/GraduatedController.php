<?php

namespace App\Http\Controllers;

use App\Models\Graduated;
use App\Http\Requests\StoreGraduatedRequest;
use App\Http\Requests\UpdateGraduatedRequest;

class GraduatedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreGraduatedRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGraduatedRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Graduated  $graduated
     * @return \Illuminate\Http\Response
     */
    public function show(Graduated $graduated)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Graduated  $graduated
     * @return \Illuminate\Http\Response
     */
    public function edit(Graduated $graduated)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGraduatedRequest  $request
     * @param  \App\Models\Graduated  $graduated
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGraduatedRequest $request, Graduated $graduated)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Graduated  $graduated
     * @return \Illuminate\Http\Response
     */
    public function destroy(Graduated $graduated)
    {
        //
    }
}

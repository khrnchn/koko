<?php

namespace App\Http\Controllers;

use App\Models\Uniform;
use App\Http\Requests\StoreUniformRequest;
use App\Http\Requests\UpdateUniformRequest;

class UniformController extends Controller
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
     * @param  \App\Http\Requests\StoreUniformRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUniformRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Uniform  $uniform
     * @return \Illuminate\Http\Response
     */
    public function show(Uniform $uniform)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Uniform  $uniform
     * @return \Illuminate\Http\Response
     */
    public function edit(Uniform $uniform)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUniformRequest  $request
     * @param  \App\Models\Uniform  $uniform
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUniformRequest $request, Uniform $uniform)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Uniform  $uniform
     * @return \Illuminate\Http\Response
     */
    public function destroy(Uniform $uniform)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Subtask;
use App\Http\Requests\StoreSubtaskRequest;
use App\Http\Requests\UpdateSubtaskRequest;

class SubtaskController extends Controller
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
     * @param  \App\Http\Requests\StoreSubtaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubtaskRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subtask  $subtask
     * @return \Illuminate\Http\Response
     */
    public function show(Subtask $subtask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subtask  $subtask
     * @return \Illuminate\Http\Response
     */
    public function edit(Subtask $subtask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubtaskRequest  $request
     * @param  \App\Models\Subtask  $subtask
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubtaskRequest $request, Subtask $subtask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subtask  $subtask
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subtask $subtask)
    {
        //
    }
}

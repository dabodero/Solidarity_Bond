<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Liker;
use Illuminate\Http\Request;

class LikerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Liker::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Liker::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Liker  $liker
     * @return \Illuminate\Http\Response
     */
    public function show(Liker $liker)
    {
        return $liker;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Liker  $liker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Liker $liker)
    {
        $liker->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Liker  $liker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Liker $liker)
    {
        $liker->delete();
    }
}

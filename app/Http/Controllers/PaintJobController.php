<?php

namespace App\Http\Controllers;

use App\Models\PaintJob;
use App\Models\Colors;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use DB;

class PaintJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = DB::table('colors')->get();

        return view('index')->with('colors', $colors);
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
     * @param  \App\Models\PaintJob  $paintJob
     * @return \Illuminate\Http\Response
     */
    public function show(PaintJob $paintJob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaintJob  $paintJob
     * @return \Illuminate\Http\Response
     */
    public function edit(PaintJob $paintJob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaintJob  $paintJob
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaintJob $paintJob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaintJob  $paintJob
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaintJob $paintJob)
    {
        //
    }

    public function viewPaintJob()
    {
        return view('paint-job');
    }
}

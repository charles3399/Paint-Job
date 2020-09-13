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
        $request->validate([
            'plate_no' => 'required|max:100',
            'current_color' => 'required',
            'target_color' => 'required',
        ]);

        $paintjob = new PaintJob;

        $paintjob->plate_no = $request->plate_no;
        $paintjob->current_color = $request->current_color;
        $paintjob->target_color = $request->target_color;

        $paintjob->save();

        return redirect('job/list');
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
        $paintjobs = DB::table('paint_jobs')
        ->select('paint_jobs.*','colors.color')
        ->join('colors','colors.id','paint_jobs.current_color')
        //->join('colors','colors.id','paint_jobs.target_color')
        //->where('paint_jobs.current_color','colors.id')
        // ->where('paint_jobs.target_color','colors.id')
        ->get();

        return view('paint-job')
        ->with('paintjobs', $paintjobs);
    }

    public function getCurrentColor($id)
    {
        $current_color = DB::table('colors')->where('id', $id)->get();

        return json_encode($current_color);
    }
}

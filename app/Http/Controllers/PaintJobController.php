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
        if($request->target_color == 1)
        {
            return redirect()->back()->with('error', 'Target color must not be default');
        }

        $request->validate([
            'plate_no' => 'required|min:7|max:7|unique:paint_jobs',
        ]);

        $paintjob = new PaintJob;

        $paintjob->plate_no = $request->plate_no;
        $paintjob->current_color = $request->current_color;
        $paintjob->target_color = $request->target_color;
        $paintjob->is_done = false;

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
    public function destroy(PaintJob $paintjob)
    {
        $paintjob->delete();

        $paintjob->update(['is_done' => true]);

        return response()->json([
            'message' => 'Paint job is done!',
        ]);

        //return redirect('job/list');
    }

    public function viewPaintJob()
    {
        $paintjobs = DB::table('paint_jobs')
        ->select('paint_jobs.*','colors.color')
        ->join('colors','colors.id','paint_jobs.current_color')
        //->join('colors','colors.id','paint_jobs.target_color')
        //->where('paint_jobs.current_color','colors.id')
        // ->where('paint_jobs.target_color','colors.id')
        ->where('paint_jobs.is_done', 0)
        ->simplePaginate(5);

        $countBlue = DB::table('paint_jobs')->where([['target_color', 4],['is_done', true]])->count();
        $countRed = DB::table('paint_jobs')->where([['target_color', 2],['is_done', true]])->count();
        $countGreen = DB::table('paint_jobs')->where([['target_color', 3],['is_done', true]])->count();

        $totalPainted = $countBlue + $countRed + $countGreen;

        return view('paint-job')
        ->with('paintjobs', $paintjobs)
        ->with('countBlue', $countBlue)
        ->with('countRed', $countRed)
        ->with('countGreen', $countGreen)
        ->with('totalPainted', $totalPainted);
    }
}

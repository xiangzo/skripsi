<?php

namespace App\Http\Controllers;

use App\Models\Perhitungan;
use App\Models\Proses;
use Illuminate\Http\Request;

class ProsesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataProses = Proses::all();
        return view('admin.proses.index', compact('dataProses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.proses.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //insert data to table proses
        Proses::create([
            'title' => $request->title,
            'location' => $request->location,
            'name' => $request->name,
            'status' => "2",
        ]);
        // insert data to table perhitungan
        Perhitungan::create([
            'ph' => $request->ph,
            'temp' => $request->temp,
            'salinity' => $request->salinity,
            'do' => $request->do,
        ]);
        return redirect()->route('proses')
            ->with('success', 'Proses created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proses  $proses
     * @return \Illuminate\Http\Response
     */
    public function show(Proses $proses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proses  $proses
     * @return \Illuminate\Http\Response
     */
    public function edit(Proses $proses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proses  $proses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proses $proses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proses  $proses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete
        $proses = Proses::find($id);
        $proses->delete();
        return redirect()->route('proses')
            ->with('success', 'Proses deleted successfully');
    }

}

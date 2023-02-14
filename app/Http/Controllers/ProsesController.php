<?php

namespace App\Http\Controllers;

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
        return view('admin.proses.index');
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
    public function destroy(Proses $proses)
    {
        //
    }
}

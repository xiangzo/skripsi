<?php

namespace App\Http\Controllers;

use App\Models\Fuzzy;
use Illuminate\Http\Request;

class FuzzyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.fuzzy.index');
    }

    public function getRules()
    {
        $dataRules = Fuzzy::all();
        return view ('admin.fuzzy.fuzzy_rules', compact('dataRules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fuzzy.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $create  = Fuzzy::create($data);
        return redirect()->route('fuzzy.getRules')
            ->with('success', 'Rule created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fuzzy  $fuzzy
     * @return \Illuminate\Http\Response
     */
    public function show(Fuzzy $fuzzy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fuzzy  $fuzzy
     * @return \Illuminate\Http\Response
     */
    public function edit(Fuzzy $fuzzy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fuzzy  $fuzzy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fuzzy $fuzzy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fuzzy  $fuzzy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fuzzy $fuzzy)
    {
        //
    }
}

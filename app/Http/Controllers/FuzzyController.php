<?php

namespace App\Http\Controllers;

use App\Models\Rules;
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
        $dataRules = Rules::all();
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
        $create  = Rules::create($data);
        return redirect()->route('fuzzy.getRules')
            ->with('success', 'Rule created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rules  $rules
     * @return \Illuminate\Http\Response
     */
    public function show(Rules $fuzzy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rules  $rules
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rules = Rules::find($id);
        return view('admin.fuzzy.edit', compact('rules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fuzzy  $fuzzy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update
        $rules = Rules::find($id);
            $rules->ph = $request->ph;
            $rules->suhu = $request->suhu;
            $rules->salinitas = $request->salinitas;
            $rules->do = $request->do;
            $rules->grade = $request->grade;
            $rules->save();
        return redirect()->route('fuzzy.getRules')
            ->with('success', 'Rule updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fuzzy  $fuzzy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete
        $rules = Rules::find($id);
        $rules->delete();
        return redirect()->route('fuzzy.getRules')
            ->with('success', 'Rule deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Perhitungan;
use App\Models\Proses;
use App\Models\Rules;
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
        $ph = $request->ph;
        $temp = $request->temp;
        $salinity = $request->salinity;
        $do = $request->do;
        $data = [
            'proses_id' => Proses::latest()->first()->id,
            'ph' => $ph,
            'temp' => $temp,
            'salinity' => $salinity,
            'do' => $do,
        ];
        // Perhitungan::create($data);
        // echo json_encode($data);
        // Rules
        //FUNGSI KEANGGOTAAN
        // ph A
        if ($ph >=7 && $ph <= 9){
            if($ph >= 7.5 && $ph <= 8.5){
                $phA = 1;
            }else if($ph > 7 && $ph < 7.5){
                $phA = ($ph - 7) / (7.5 - 7);
            }else if($ph > 8.5 && $ph < 9){
                $phA = (9 - $ph) / (9 - 8.5);
            }else if($ph <= 7 || $ph >= 9){
                $phA = 0;
            }
        }
        // echo json_encode($phA);
        // ph B
        if (($ph >= 6.5 && $ph <= 7.5) or ($ph >= 8.5 && $ph <= 10)){
            if(($ph >= 6.9 && $ph <= 7) or ($ph >= 9 && $ph <= 9.5)){
                $phB = 1;
            }else if($ph > 6.5 && $ph < 6.9){
                $phB = ($ph - 6.5) / (6.9 - 6.5);
            }else if($ph > 7 && $ph < 7){
                $phB = (7.5 - $ph) / (7.5 - 7);
            }else if ($ph > 8.5 && $ph < 9){
                $phB = ($ph - 8.5) / (9 - 8.5);
            }else if($ph > 9.5 && $ph < 10){
                $phB = (10 - $ph) / (10 - 9.5);
            }else if($ph <= 6 || $ph >= 7.5 && $ph <= 8.5 || $ph >= 10 ){
                $phB = 0;
            }
        }
        // echo json_encode($phB);

        //suhu A
        if ($temp >= 25 && $temp <= 35){
            if($temp >= 28 && $temp <= 30){
                $tempA = 1;
            }else if($temp > 25 && $temp < 28){
                $tempA = ($temp - 25) / (28 - 25);
            }else if($temp > 30 && $temp < 35){
                $tempA = (35 - $temp) / (35 - 30);
            }else if($temp <= 25 || $temp >= 35){
                $tempA = 0;
            }
        }
        // echo json_encode($tempA);
        //suhu B
        if (($temp >= 22 && $temp <= 28) or ($temp >= 30 && $temp <= 40)){
            if(($temp >= 24 && $temp <= 25) or ($temp >= 35 && $temp <= 38)){
                $tempB = 1;
            }else if($temp > 22 && $temp < 24){
                $tempB = ($temp - 22) / (24 - 22);
            }else if($temp > 25 && $temp < 28){
                $tempB = (28 - $temp) / (28 - 25);
            }else if($temp > 30 && $temp < 35){
                $tempB = ($temp - 30) / (35 - 30);
            }else if($temp > 38 && $temp < 40){
                $tempB = (40 - $temp) / (40 - 38);
            }else if($temp <= 22 || $temp >= 28 && $temp <= 30 || $temp >= 40 ){
                $tempB = 0;
            }
        }
        // echo json_encode($tempB);

        //salinitas A
        if ($salinity >= 18 && $salinity <= 30){
            if($salinity >= 20 && $salinity <= 28){
                $saltA = 1;
            }else if($salinity > 18 && $salinity < 20){
                $saltA = ($salinity - 18) / (20 - 18);
            }else if($salinity > 28 && $salinity < 30){
                $saltA = (30 - $salinity) / (30 - 28);
            }else if($salinity <= 18 || $salinity >= 30){
                $saltA = 0;
            }
        }
        // echo json_encode($saltA);
        //salinitas B
        if (($salinity >= 10 && $salinity <= 20) or ($salinity >= 28 && $salinity <= 38)){
            if(($salinity >= 13 && $salinity <= 18) or ($salinity >= 30 && $salinity <= 35)){
                $saltB = 1;
            }else if($salinity > 10 && $salinity < 13){
                $saltB = ($salinity - 10) / (13 - 10);
            }else if($salinity > 18 && $salinity < 20){
                $saltB = (20 - $salinity) / (20 - 18);
            }else if($salinity > 28 && $salinity < 30){
                $saltB = ($salinity - 28) / (30 - 28);
            }else if($salinity > 35 && $salinity < 38){
                $saltB = (38 - $salinity) / (38 - 35);
            }else if($salinity <= 10 || $salinity >= 20 && $salinity <= 28 || $salinity >= 38 ){
                $saltB = 0;
            }
        }
        // echo json_encode($saltB);

        //do A
        if ($do >= 4 && $do <= 7){
            if($do >= 4.5 && $do <= 6.5){
                $doA = 1;
            }else if($do > 4 && $do < 4.5){
                $doA = ($do - 4) / (4.5 - 4);
            }else if($do > 6.5 && $do < 7){
                $doA = (7 - $do) / (7 - 6.5);
            }else if($do <= 4 || $do >= 7){
                $doA = 0;
            }
        }
        //do B
        if (($do >= 3.2 && $do <= 4.5) or ($do >= 6.5 && $do <= 8)){
            if(($do >= 3.5 && $do <= 4) or ($do >= 7 && $do <= 7.5)){
                $doB = 1;
            }else if($do > 3.2 && $do < 3.5){
                $doB = ($do - 3.2) / (3.5 - 3.2);
            }else if($do > 4 && $do < 4.5){
                $doB = (4.5 - $do) / (4.5 - 4);
            }else if($do > 6.5 && $do < 7){
                $doB = ($do - 6.5) / (7 - 6.5);
            }else if($do > 7.5 && $do < 8){
                $doB = (8 - $do) / (8 - 7.5);
            }else if($do <= 3.2 || $do >= 4.5 && $do <= 6.5 || $do >= 8 ){
                $doB = 0;
            }
        }

        //FUNGSI KEANGGOTAAN END
        //set value keanggotaan
        $ph_setA = $temp_setA = $salinity_setA = $do_setA = 'baik';
        $ph_setB = $temp_setB = $salinity_setB = $do_setB = 'sedang';

        //FUZZYFIKASI START
        //ph
        if (isset($phA) && isset($phB)) {
            $phOutput = [$phA, $phB];
            $phGrade = [$ph_setA, $ph_setB];
        } else if (isset($phA)) {
            $phOutput = [$phA];
            $phGrade = [$ph_setA];
        } else if (isset($phB)) {
            $phOutput = [$phB];
            $phGrade = [$ph_setB];
        }

        //temp
        if (isset($tempA) && isset($tempB)) {
            $tempOutput = [$tempA, $tempB];
            $tempGrade = [$temp_setA, $temp_setB];
        } else if (isset($tempA)) {
            $tempOutput = [$tempA];
            $tempGrade = [$temp_setA];
        } else if (isset($tempB)) {
            $tempOutput = [$tempB];
            $tempGrade = [$temp_setB];
        }

        //salinity
        if (isset($saltA) && isset($saltB)) {
            $saltOutput = [$saltA, $saltB];
            $saltGrade = [$salinity_setA, $salinity_setB];
        } else if (isset($saltA)) {
            $saltOutput = [$saltA];
            $saltGrade = [$salinity_setA];
        } else if (isset($saltB)) {
            $saltOutput = [$saltB];
            $saltGrade = [$salinity_setB];
        }

        //do
        if (isset($doA) && isset($doB)) {
            $doOutput = [$doA, $doB];
            $doGrade = [$do_setA, $do_setB];
        } else if (isset($doA)) {
            $doOutput = [$doA];
            $doGrade = [$do_setA];
        } else if (isset($doB)) {
            $doOutput = [$doB];
            $doGrade = [$do_setB];
        }

        echo json_encode($phOutput);
        echo json_encode($tempOutput);
        echo json_encode($saltOutput);
        echo json_encode($doOutput);
        echo json_encode($phGrade);
        echo json_encode($tempGrade);
        echo json_encode($saltGrade);
        echo json_encode($doGrade);

        //FUZZYFIKASI END

        //RULE START
        foreach ($phGrade as $p) {
            foreach ($tempGrade as $t) {
                foreach ($saltGrade as $s) {
                    foreach ($doGrade as $d) {
                        $rule = Rules::where('ph', $p)->where('temperature', $t)->where('salinity', $s)->where('do', $d)->get();

                    }
                }
            }
        }

    }

    //detail function

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

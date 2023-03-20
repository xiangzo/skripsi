<?php

namespace App\Http\Controllers;

use App\Models\Perhitungan;
use App\Models\PerhitunganDetail;
use App\Models\Proses;
use App\Models\Rules;
use App\Models\RulesGrade;
use App\Models\sensor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function index()
    {
        return view('admin.perhitungan.index');
    }

    public function create(Request $request)
    {
        Proses::create([
            'title' => $request->title,
            'location' => $request->location,
            'name' => $request->name,
            'status' => "1",
        ]);
        return redirect()->route('proses')
            ->with('success', 'Perhitungan created successfully.');
    }

    public function detail($id)
    {
        $detailPerhitungan = Proses::find($id);
        return view('admin.perhitungan.detail', compact('detailPerhitungan'));
    }

    public function store(Request $request)
    {
        //ambil data terakhir dari table sensor
        $data = sensor::latest()->first();
        $proses_id = $data->proses_id;
        $ph = $data->ph;
        $temp = $data->suhu;
        $salinity = $data->salinitas;
        $do = $request->do;
        $dataHitung = [
            'proses_id' => $proses_id,
            'ph' => $ph,
            'temp' => $temp,
            'salinity' => $salinity,
            'do' => $do,
        ];
        Perhitungan::create($dataHitung);
        // echo json_encode($dataHitung);
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
        // ph C
        if (($ph >= 4.5 && $ph <= 6.9) or ($ph >= 9.5 && $ph <= 12)){
            if(($ph >= 5 && $ph <= 6.5) or ($ph >= 10 && $ph <= 11.5)){
                $phC = 1;
            }else if($ph > 4.5 && $ph < 5){
                $phC = ($ph - 4.5) / (5 - 4.5);
            }else if($ph > 6.5 && $ph < 6.9){
                $phC = (6.9 - $ph) / (6.9 - 6.5);
            }else if ($ph > 9.5 && $ph < 10){
                $phC = ($ph - 9.5) / (10 - 9.5);
            }else if($ph > 11.5 && $ph < 12){
                $phC = (12 - $ph) / (12 - 11.5);
            }else if($ph <= 4.5 || $ph >= 6.9 && $ph <= 9.5 || $ph >= 12 ){
                $phC = 0;
            }
        }
        // echo json_encode($phC);
        // ph D
        if ($ph >= 11.5 || $ph <= 5){
            if($ph >= 12.5 || $ph <= 3){
                $phD = 1;
            }else if($ph > 3 && $ph < 5){
                $phD = ($ph - 4.5) / (5 - 4.5);
            }else if($ph > 11.5 && $ph < 12.5){
                $phD = (12.5 - $ph) / (12.5 - 11.5);
            }else if($ph >= 5 && $ph <= 11.5){
                $phD = 0;
            }
        }
        // echo json_encode($phD);

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
        //suhu C
        if (($temp >= 15 && $temp <= 24) or ($temp >= 38 && $temp <= 45)){
            if(($temp >= 18 && $temp <= 22) or ($temp >= 40 && $temp <= 44)){
                $tempC = 1;
            }else if($temp > 15 && $temp < 18){
                $tempC = ($temp - 15) / (18 - 15);
            }else if($temp > 22 && $temp < 24){
                $tempC = (24 - $temp) / (24 - 22);
            }else if($temp > 38 && $temp < 40){
                $tempC = ($temp - 38) / (40 - 38);
            }else if($temp > 44 && $temp < 45){
                $tempC = (45 - $temp) / (45 - 44);
            }else if($temp <= 15 || $temp >= 24 && $temp <= 38 || $temp >= 45 ){
                $tempC = 0;
            }
        }
        // echo json_encode($tempC);
        //suhu D
        if ($temp >= 44 || $temp <= 18){
            if($temp >= 52 || $temp <= 7){
                $tempD = 1;
            }else if($temp > 7 && $temp < 18){
                $tempD = ($temp - 7) / (18 - 7);
            }else if($temp > 44 && $temp < 52){
                $tempD = (52 - $temp) / (52 - 44);
            }else if($temp >= 18 && $temp <= 44){
                $tempD = 0;
            }
        }
        // echo json_encode($tempD);

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
        //salinitas C
        if (($salinity >= 5 && $salinity <= 13) or ($salinity >= 35 && $salinity <= 42)){
            if(($salinity >= 7 && $salinity <= 10) or ($salinity >= 38 && $salinity <= 40)){
                $saltC = 1;
            }else if($salinity > 5 && $salinity < 7){
                $saltC = ($salinity - 5) / (7 - 5);
            }else if($salinity > 10 && $salinity < 13){
                $saltC = (13 - $salinity) / (13 - 10);
            }else if($salinity > 35 && $salinity < 38){
                $saltC = ($salinity - 35) / (38 - 35);
            }else if($salinity > 40 && $salinity < 42){
                $saltC = (42 - $salinity) / (42 - 40);
            }else if($salinity <= 5 || $salinity >= 13 && $salinity <= 35 || $salinity >= 42 ){
                $saltC = 0;
            }
        }
        // echo json_encode($saltC);
        //salinitas D
        if ($salinity <= 7 || $salinity >= 40){
            if($salinity <= 3 || $salinity >= 45){
                $saltD = 1;
            }else if($salinity > 3 && $salinity < 7){
                $saltD = ($salinity - 3) / (7 - 3);
            }else if($salinity > 40 && $salinity < 45){
                $saltD = (45 - $salinity) / (45 - 40);
            }else if($salinity >= 7 && $salinity <= 40){
                $saltD = 0;
            }
        }
        // echo json_encode($saltD);

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
        //do C
        if (($do >= 2 && $do <= 3.5) or ($do >= 7.5 && $do <= 9)){
            if(($do >= 3 && $do <= 3.2) or ($do >= 8 && $do <= 8.5)){
                $doC = 1;
            }else if($do > 2 && $do < 3){
                $doC = ($do - 2) / (3 - 2);
            }else if($do > 3.2 && $do < 3.5){
                $doC = (3.5 - $do) / (3.5 - 3.2);
            }else if($do > 7.5 && $do < 8){
                $doC = ($do - 7.5) / (8 - 7.5);
            }else if($do > 8.5 && $do < 9){
                $doC = (9 - $do) / (9 - 8.5);
            }else if($do <= 2 || $do >= 3.5 && $do <= 7.5 || $do >= 9 ){
                $doC = 0;
            }
        }
        //do D
        if ($do <= 3 || $do >= 8.5){
            if($do <= 1 || $do >= 9.5){
                $doD = 1;
            }else if($do > 1 && $do < 3){
                $doD = ($do - 1) / (3 - 1);
            }else if($do > 8.5 && $do < 9.5){
                $doD = (9.5 - $do) / (9.5 - 8.5);
            }else if($do >= 3 && $do <= 8.5){
                $doD = 0;
            }
        }

        //FUNGSI KEANGGOTAAN END
        //set value keanggotaan
        $ph_setA = $temp_setA = $salinity_setA = $do_setA = 'baik';
        $ph_setB = $temp_setB = $salinity_setB = $do_setB = 'sedang';
        $ph_setC = $temp_setC = $salinity_setC = $do_setC = 'buruk';
        $ph_setD = $temp_setD = $salinity_setD = $do_setD = 'sangat buruk';

        //FUZZYFIKASI START
        //ph
        if (isset($phA) && isset($phB)) {
            $phOutput = [$phA, $phB];
            $phGrade = [$ph_setA, $ph_setB];
        } else  if (isset($phA) && isset($phC)) {
            $phOutput = [$phA, $phC];
            $phGrade = [$ph_setA, $ph_setC];
        } else  if (isset($phA) && isset($phD)) {
            $phOutput = [$phA, $phD];
            $phGrade = [$ph_setA, $ph_setD];
        } else  if (isset($phB) && isset($phC)) {
            $phOutput = [$phB, $phC];
            $phGrade = [$ph_setB, $ph_setC];
        } else  if (isset($phB) && isset($phD)) {
            $phOutput = [$phB, $phD];
            $phGrade = [$ph_setB, $ph_setD];
        } else  if (isset($phC) && isset($phD)) {
            $phOutput = [$phC, $phD];
            $phGrade = [$ph_setC, $ph_setD];
        } else if (isset($phA)) {
            $phOutput = [$phA];
            $phGrade = [$ph_setA];
        } else if (isset($phB)) {
            $phOutput = [$phB];
            $phGrade = [$ph_setB];
        } else if (isset($phC)) {
            $phOutput = [$phC];
            $phGrade = [$ph_setC];
        } else if (isset($phD)) {
            $phOutput = [$phD];
            $phGrade = [$ph_setD];
        }

        //temp
        if (isset($tempA) && isset($tempB)) {
            $tempOutput = [$tempA, $tempB];
            $tempGrade = [$temp_setA, $temp_setB];
        } else if (isset($tempA) && isset($tempC)) {
            $tempOutput = [$tempA, $tempC];
            $tempGrade = [$temp_setA, $temp_setC];
        } else if (isset($tempA) && isset($tempD)) {
            $tempOutput = [$tempA, $tempD];
            $tempGrade = [$temp_setA, $temp_setD];
        } else if (isset($tempB) && isset($tempC)) {
            $tempOutput = [$tempB, $tempC];
            $tempGrade = [$temp_setB, $temp_setC];
        } else if (isset($tempB) && isset($tempD)) {
            $tempOutput = [$tempB, $tempD];
            $tempGrade = [$temp_setB, $temp_setD];
        } else if (isset($tempC) && isset($tempD)) {
            $tempOutput = [$tempC, $tempD];
            $tempGrade = [$temp_setC, $temp_setD];
        } else if (isset($tempA)) {
            $tempOutput = [$tempA];
            $tempGrade = [$temp_setA];
        } else if (isset($tempB)) {
            $tempOutput = [$tempB];
            $tempGrade = [$temp_setB];
        } else if (isset($tempC)) {
            $tempOutput = [$tempC];
            $tempGrade = [$temp_setC];
        } else if (isset($tempD)) {
            $tempOutput = [$tempD];
            $tempGrade = [$temp_setD];
        }

        //salinity
        if (isset($saltA) && isset($saltB)) {
            $saltOutput = [$saltA, $saltB];
            $saltGrade = [$salinity_setA, $salinity_setB];
        } else if (isset($saltA) && isset($saltC)) {
            $saltOutput = [$saltA, $saltC];
            $saltGrade = [$salinity_setA, $salinity_setC];
        } else if (isset($saltA) && isset($saltD)) {
            $saltOutput = [$saltA, $saltD];
            $saltGrade = [$salinity_setA, $salinity_setD];
        } else if (isset($saltB) && isset($saltC)) {
            $saltOutput = [$saltB, $saltC];
            $saltGrade = [$salinity_setB, $salinity_setC];
        } else if (isset($saltB) && isset($saltD)) {
            $saltOutput = [$saltB, $saltD];
            $saltGrade = [$salinity_setB, $salinity_setD];
        } else if (isset($saltC) && isset($saltD)) {
            $saltOutput = [$saltC, $saltD];
            $saltGrade = [$salinity_setC, $salinity_setD];
        } else if (isset($saltA)) {
            $saltOutput = [$saltA];
            $saltGrade = [$salinity_setA];
        } else if (isset($saltB)) {
            $saltOutput = [$saltB];
            $saltGrade = [$salinity_setB];
        } else if (isset($saltC)) {
            $saltOutput = [$saltC];
            $saltGrade = [$salinity_setC];
        } else if (isset($saltD)) {
            $saltOutput = [$saltD];
            $saltGrade = [$salinity_setD];
        }

        //do
        if (isset($doA) && isset($doB)) {
            $doOutput = [$doA, $doB];
            $doGrade = [$do_setA, $do_setB];
        } else if (isset($doA) && isset($doC)) {
            $doOutput = [$doA, $doC];
            $doGrade = [$do_setA, $do_setC];
        } else if (isset($doA) && isset($doD)) {
            $doOutput = [$doA, $doD];
            $doGrade = [$do_setA, $do_setD];
        } else if (isset($doB) && isset($doC)) {
            $doOutput = [$doB, $doC];
            $doGrade = [$do_setB, $do_setC];
        } else if (isset($doB) && isset($doD)) {
            $doOutput = [$doB, $doD];
            $doGrade = [$do_setB, $do_setD];
        } else if (isset($doC) && isset($doD)) {
            $doOutput = [$doC, $doD];
            $doGrade = [$do_setC, $do_setD];
        } else if (isset($doA)) {
            $doOutput = [$doA];
            $doGrade = [$do_setA];
        } else if (isset($doB)) {
            $doOutput = [$doB];
            $doGrade = [$do_setB];
        } else if (isset($doC)) {
            $doOutput = [$doC];
            $doGrade = [$do_setC];
        } else if (isset($doD)) {
            $doOutput = [$doD];
            $doGrade = [$do_setD];
        }

        // echo json_encode($phOutput);
        // echo json_encode($tempOutput);
        // echo json_encode($saltOutput);
        // echo json_encode($doOutput);
        // echo json_encode($phGrade);
        // echo json_encode($tempGrade);
        // echo json_encode($saltGrade);
        // echo json_encode($doGrade);

        //FUZZYFIKASI END

         //RULE START
         foreach ($phGrade as $key => $p) {
            foreach ($tempGrade as $key2 => $t) {
                foreach ($saltGrade as $key3 => $s) {
                    foreach ($doGrade as $key4 => $d) {
                        $rule = Rules::where('ph', $p)->where('temp', $t)->where('salinity', $s)->where('do', $d)->get();
                        // echo json_encode($rule);
                        $min = min($phOutput[$key],$tempOutput[$key2],$saltOutput[$key3],$doOutput[$key4]);
                        foreach ($rule as $r) {
                            $dataRules = [
                                //last id from table perhitungan
                                'id_perhitungan' => Perhitungan::latest()->first()->id,
                                'id_rules' => $r->_id,
                                'nilai_min' => $min,
                            ];
                            // echo json_encode($dataRules);
                            RulesGrade::create($dataRules);
                        }
                    }
                }
            }
        }
        //RULE END

        //get rules with nilai min
        $getRules = RulesGrade::where('id_perhitungan', Perhitungan::latest()->first()->id)
        ->with('rules', 'perhitungan')
        ->get();
        // echo json_encode($getRules);

        //mencari nilai z
        foreach ($getRules as $gr){
            $grade = $gr->rules->grade;
            $min = $gr->nilai_min;

            if ($grade == "A") {
                $gradeA = 75 + ($min * (100 - 75));
                $hasilA = $gradeA * $min;
            } else if ($grade == "B") {
                $gradeB = 50 + ($min * (75 - 50));
                $hasilA = $gradeB * $min;
            } else if ($grade == "C") {
                $gradeC = 25 + ($min * (50 - 25));
                $hasilA = $gradeC * $min;
            } else if ($grade == "D") {
                $gradeD = 0 + ($min * (25 - 0));
                $hasilA = $gradeD * $min;
            }
            //update rules grade
            RulesGrade::where('_id', $gr->_id)->update([
                'inf' => $hasilA,
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
        // echo json_encode($getRules);
        // mencari nilai z end

        //defuzzy
        //jumlah $min
        $inf = RulesGrade::where('id_perhitungan', Perhitungan::latest()->first()->id)->sum('inf');
        $sums = RulesGrade::where('id_perhitungan', Perhitungan::latest()->first()->id)->sum('nilai_min');
        $defuzzy = $inf / $sums;
        // echo json_encode($inf);
        // echo (' / ');
        // echo json_encode($sums);
        // echo (' = ');
        // echo json_encode($defuzzy);
        //defuzzy end

        //output kualitas air
        if ($defuzzy >= 0 && $defuzzy <= 25) {
            $status = "Sangat Buruk";
        } else if ($defuzzy >= 26 && $defuzzy <= 50) {
            $status = "Buruk";
        } else if ($defuzzy >= 51 && $defuzzy <= 75) {
            $status = "Sedang";
        } else if ($defuzzy >= 76 && $defuzzy <= 100) {
            $status = "Baik";
        }
        // echo json_encode($status);

        //add to perhitungan detail
        $data = [
            'id_perhitungan' => Perhitungan::latest()->first()->id,
            'defuzzy' => ceil($defuzzy),
            'status' => $status,
        ];
        PerhitunganDetail::create($data);
        // echo json_encode($data);
        // dd($data);
        return redirect()->route('proses.detail', $proses_id);
    }

    public function history()
    {
        $data = Perhitungan::with('proses')->with('perhitunganDetail')->get();
        // return response()->json($data);
        return view('admin.history.index', compact('data'));
    }

}

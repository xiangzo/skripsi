<?php

namespace App\Http\Controllers;

use App\Models\Proses;
use App\Models\sensor;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ApiController extends Controller
{
    public function store(Request $request)
    {
        if ($request->header('Authorization') != 'Bearer ' . env('API_TOKEN')) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

          //jika semua data request ada yang null maka tidak akan disimpan
          if ($request->get('suhu') == null || $request->get('pH') == null || $request->get('Garam') == null || $request->get('kalmanSuhu') == null || $request->get('kalmanPh') == null || $request->get('kalmanGaram') == null) {
            return response()->json(['message' => 'Data tidak lengkap'], 400);
        }
            $proses_id = Proses::orderby('created_at', 'desc')->limit(1)->select('id')->get();
            $data_API = new sensor();
            $data_API->proses_id = $proses_id[0]->id;
            $data_API->suhu = $request->get('suhu');
            $data_API->ph = $request->get('pH');
            $data_API->salinitas = $request->get('Garam');
            $data_API->tanggal = Carbon::now()->format('Y-m-d H:i:s');
            $data_API->save();
            return response()->json($data_API);
    }
}

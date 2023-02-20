<?php

namespace App\Http\Controllers;

use App\Models\Proses;
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

    public function store(Request $request)
    {

    }
}

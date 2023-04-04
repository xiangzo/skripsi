<?php

namespace App\Http\Controllers;

use App\Models\sensor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $sensor = sensor::latest()->first();
        return view('admin.index', compact('sensor'));
    }
}

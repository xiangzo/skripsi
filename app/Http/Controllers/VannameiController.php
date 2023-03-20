<?php

namespace App\Http\Controllers;

use App\Models\Vannamei;
use Illuminate\Http\Request;


class VannameiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vannamei = Vannamei::all()->first();
        // dd($vannamei);
        return view('admin.vannamei.index', compact('vannamei'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //edit data
        if(auth()->user()->role != '1'){
            return redirect()->route('home');
        }
        $vannamei = Vannamei::find($id);
        return view('admin.vannamei.litopenaeus_vannamei_edit', compact('vannamei'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update data
        //find id
        $data = Vannamei::find($id);
        // dd($vannamei);
        if($request->hasFile('vannamei_image')){
            $file = $request->file('vannamei_image');
            $nama = date('Y-m-dHis') . '.' . $file->getClientOriginalExtension();
            //jika gambar ada di folder public maka dihapus
            if($data->vannamei_image && file_exists(public_path($data->vannamei_image))){
                unlink(public_path($data->vannamei_image));
            }
            $file->move(public_path('storage/image'), $nama);
            $data->vannamei_image = "storage/image/$nama";
        }
        $data->title = $request->title;
        $data->subtitle = $request->subtitle;
        $data->description = $request->description;
        $data->save();
        return redirect()->route('vannamei')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

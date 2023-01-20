<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::find(Auth::user()->id);
        // dd($users);
        return view('admin.profile.index', compact('users'));
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
        $data = $request->all();
        $create = User::create($data);
        return redirect()->route('admin.profile.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //update profile
        $data = User::findOrfail(Auth::user()->id);
        // dd($request->all());
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $nama = date('Y-m-dHis') . '.' . $file->getClientOriginalExtension();
            //jika gambar ada di folder public maka dihapus
            if($data->avatar && file_exists(public_path($data->avatar))){
                unlink(public_path($data->avatar));
            }
            $file->move(public_path('storage/avatar'), $nama);
            $data->avatar = "storage/avatar/$nama";
        }
        //update
        // $data->update($request->all());
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        if($request->password != null){
            $data->password = bcrypt($request->password);
        }
        $data->address = $request->address;
        $data->phone_number = $request->phoneNumber;
        $data->save();
        // dd($data);
        return redirect()->route('profile');
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

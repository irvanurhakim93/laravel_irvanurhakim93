<?php

namespace App\Http\Controllers;

use App\Models\Rumahsakit;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RumahSakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $loginprocess = User::where('username', '=', $request->username)->first();
        if(!$loginprocess){
            return back();
        } else {
            return redirect()->route('gotodashboard');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return $this->index();
    }

    public function dashboard()
    {
        $datars = Rumahsakit::all();
        return view('dashboard',compact('datars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namars' => 'required',
            'alamatrs' => 'required',
            'emailrs' => 'required',
            'teleponrs' => 'required' 
        ]);

        $input = new Rumahsakit;
        $input->nama_rumah_sakit = $request->namars;
        $input->alamat = $request->alamatrs;
        $input->email = $request->emailrs;
        $input->telepon = $request->teleponrs;

        $input->save();
        return redirect()->route('gotodashboard')->with('Sukses', 'Data rumah sakit telah ditambahkan');
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
        $data = Rumahsakit::findOrFail($id);
        return view('edit',compact('data'));
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
        $this->validate($request,[
            'namars',
            'alamatrs',
            'emailrs',
            'teleponrs',
            'updated_at'
        ]);

        $data = Rumahsakit::find($id);
        $data->nama_rumah_sakit = $request->namars;
        $data->alamat = $request->alamatrs;
        $data->email = $request->emailrs;
        $data->telepon = $request->teleponrs;
        $data->updated_at = Carbon::now();

        $data->save();

        return redirect()->route('gotodashboard')->with('sukses','Data telah berhasi diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rumahsakit::where('id',$id)->delete();

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Data rumah sakit berhasil dihapus'
        // ]);

        return redirect()->route('gotodashboard');
    }
}

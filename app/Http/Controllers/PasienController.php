<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datapasien = Pasien::all();
        return view('pasien.dashboard',compact('datapasien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasien.create');
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
            'namapasien' => 'required',
            'alamatpasien' => 'required',
            'notelppasien' => 'required',
            'noidrs' => 'required'
        ]);

        $input = new Pasien;
        $input->nama_pasien = $request->namapasien;
        $input->alamat = $request->alamatpasien;
        $input->no_telpon = $request->notelppasien;
        $input->id_rumah_sakit = $request->noidrs;
        
        $input->save();

        return redirect()->route('pasien.dashboard');

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
        $data = Pasien::findOrFail($id);
        return view('pasien.edit',compact('data'));
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
        $request->validate([
            'namapasien' => 'required',
            'alamatpasien' => 'required',
            'notelppasien' => 'required',
        ]);

        $edit = Pasien::find($id);
        $edit->nama_pasien = $request->namapasien;
        $edit->alamat = $request->alamatpasien;
        $edit->no_telpon = $request->notelppasien;

        $edit->save();

        return redirect()->route('pasien.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pasien::where('id',$id)->delete();

        return redirect()->route('pasien.dashboard');


    }
}

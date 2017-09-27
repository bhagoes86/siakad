<?php

namespace App\Http\Controllers\Krs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Krs;

class KrsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Krs::with('mahasiswa')->get();
        // $dosen = \App\Dosen::with('krs')->get();
        // $mhs   = \App\Mahasiswa::with('krs')->get();
        // $makul = \App\Matakuliah::with('krs')->get();

        return view('Krs.krsIndex',compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mhs = \App\Mahasiswa::with('krs')->select('nim','nama')->get();
        $dosen = \App\Dosen::with('krs')->select('nip','nama')->get();
        $makul = \App\Matakuliah::with('krs')->select('kode_mk','makul')->get();
        
        return view('Krs.krsInsert',compact('mhs','dosen','makul'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $krs = new Krs([
            'nim' => $request->get('nim'),
            'nip' => $request->get('nip'),
            'kode_mk' => $request->get('kode_mk'),
            'absen' => $request->get('absen'),
            'uts' => $request->get('uts'),
            'uas' => $request->get('uas')
        ]);

        if ($krs->save()) {
            session()->flash('status','done_all');
            session()->flash('pesan','Data berhasil disimpan');
        }else{
            session()->flash('status','clear');
            session()->flash('pesan','Data gagal disimpan');
        }

        return redirect('Krs/create');
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
        $krs = Krs::find($id);
        $mhs = \App\Mahasiswa::with('krs')->select('nim','nama')->where('')->get();
        $dosen = \App\Dosen::with('krs')->select('nip','nama')->where()->get();
        $makul = \App\Matakuliah::with('krs')->select('kode_mk','makul')->get();
        
        return view('Krs.krsEdit',compact('id','mhs','dosen','makul'));
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
        //
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

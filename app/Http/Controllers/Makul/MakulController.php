<?php

namespace App\Http\Controllers\Makul;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Matakuliah;
use App\Http\Requests\MakulRequest;

class MakulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Makul.makulInsert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MakulRequest $request)
    {
        
        $ambil = new Matakuliah([
            'kode_mk' => $request->get('kode_mk'),
            'makul' => $request->get('makul'),
            'sks' => $request->get('sks')
        ]);

        if ($ambil->save()) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('pesan','Data Berhasil Disimpan');
        }else{
            $request->session()->flash('status', 'danger');
            $request->session()->flash('pesan', 'Datag Gagal Disimpan');
        }

        return redirect('/Makul/create');
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

<?php

namespace App\Http\Controllers\Akademik\Makul;

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
    public function index(Request $request)
    {
        $datas = Matakuliah::sortable()->paginate(10);
        return view('Akademik.Makul.makulIndex', compact('datas'))->with('no',($request->input('page',1)-1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Akademik/Makul.makulInsert');
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
            session()->flash('status','done_all');
            session()->flash('pesan','Data berhasil disimpan');
        }else{
            session()->flash('status','clear');
            session()->flash('pesan','Data gagal disimpan');
        }

        return redirect('/Akademik/Makul/create');
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
        $dec = decrypt($id);
        $data = Matakuliah::find($dec);
        return view('Akademik.Makul.makulEdit',compact('data','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MakulRequest $request, $id)
    {
        $dec = decrypt($id);
        $update = Matakuliah::find($dec);
        $update->kode_mk = $request->get('kode_mk');
        $update->makul = $request->get('makul');
        $update->sks = $request->get('sks');

        if ($update->save()) {
            session()->flash('status','done_all');
            session()->flash('pesan','Data berhasil disimpan');
        }else{
            session()->flash('status','clear');
            session()->flash('pesan','Data gagal disimpan');
        }

        return redirect('/Akademik/Makul');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dec = decrypt($id);
        $hapus = Matakuliah::findOrFail($dec);

        if ($hapus->delete()) {
            session()->flash('status','done_all');
            session()->flash('pesan','Data berhasil disimpan');
        }else{
            session()->flash('status','clear');
            session()->flash('pesan','Data gagal disimpan');
        }
        return redirect('/Akademik/Makul');

    }

    public function search(Request $request)
    {
        $cari = $request->get('cari');
        $datas = Matakuliah::where('makul','LIKE','%'.$cari.'%')->paginate(10);

        return view('Akademik.Makul.makulIndex',compact('datas'))->with('no',($request->input('page',1)-1)*10);
    }
}

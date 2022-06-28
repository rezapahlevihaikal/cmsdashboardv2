<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Divisi;

class DivisiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dataDivisi = Divisi::all();
        return view('divisi.index', compact('dataDivisi'));
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
        $dataDivisi = Divisi::create([
            'nama_divisi' => $request->nama_divisi
        ]);

        if ($dataDivisi) {
            # code...
            return redirect()->route('divisi')->with('success', 'Data Berhasil Diinput');
        }
        else
        {
            return redirect()->back()->with('error', 'Data Gagal Diinput');
        }
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
        $dataDivisi = Divisi::findOrFail($id);
        return view('divisi.edit', compact('dataDivisi'));
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
        $dataDivisi = Divisi::findOrFail($id);
        $dataDivisi->update([
            'nama_divisi' => $request->nama_divisi
        ]);

        if($dataDivisi)
        {
            return redirect()->route('divisi')->with('succes', 'Data Berhasil Diinput');
        }
        else
        {
            return redirect()->back()->with('error', 'Data Gagal Diinput');
        }
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
        $dataDivisi = Divisi::findOrFail($id);
        $dataDivisi->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}

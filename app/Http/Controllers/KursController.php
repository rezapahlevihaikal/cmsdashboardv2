<?php

namespace App\Http\Controllers;

use App\Models\Kurs;
use Illuminate\Http\Request;

class KursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dataKurs  = Kurs::all();
        return view('kurs.index', compact('dataKurs'));
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
     * @param  \App\Models\Kurs  $kurs
     * @return \Illuminate\Http\Response
     */
    public function show(Kurs $kurs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kurs  $kurs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $dataKurs = Kurs::find($id);
        return view('kurs.edit', compact('dataKurs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kurs  $kurs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $dataKurs = Kurs::find($id);
        $dataKurs->update([
            'tanggal' => $request->tanggal,
            'kurs' => $request->kurs,
        ]);

        if ($dataKurs) {
            # code...
            return redirect('kurs')->with('success', 'Data Berhasil Diupdate');
        }
        else {
            return redirect()->route('kurs.index')->with('error', 'Data Gagal Diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kurs  $kurs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kurs $kurs)
    {
        //
    }
}

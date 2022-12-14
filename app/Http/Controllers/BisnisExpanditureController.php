<?php

namespace App\Http\Controllers;

use App\Models\BisnisExpanditure;
use App\Models\CoreBisnis;
use App\Models\MasterExpanditure;
use Illuminate\Http\Request;

class BisnisExpanditureController extends Controller
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
        $dataCoreBisnis = CoreBisnis::get(['id', 'nama_core_bisnis']);
        $dataMaster = MasterExpanditure::get(['id', 'name', 'kategori']);
        $data = BisnisExpanditure::with(['getCoreBisnis', 'getKategori'])->get();

        return view('bisnisExpanditure.index', compact('dataCoreBisnis', 'dataMaster', 'data'));
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
        $data = BisnisExpanditure::create([
            'core_bisnis_id' => $request->core_bisnis_id,
            'sub_domain' => $request->sub_domain,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'kategori_id' => $request->kategori_id,
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
        ]);

        if ($data) {
            return redirect()->route('bisnisExpanditure')->with('success', 'data berhasil diinput');
        } else {
            return redirect()->back()->with('error', 'data gagal diinput');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BisnisExpanditure  $bisnisExpanditure
     * @return \Illuminate\Http\Response
     */
    public function show(BisnisExpanditure $bisnisExpanditure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BisnisExpanditure  $bisnisExpanditure
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataCoreBisnis = CoreBisnis::get(['id', 'nama_core_bisnis']);
        $dataMaster = MasterExpanditure::get(['id', 'name', 'kategori']);
        $data = BisnisExpanditure::find($id);

        return view('bisnisExpanditure.edit', compact('dataCoreBisnis', 'dataMaster', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BisnisExpanditure  $bisnisExpanditure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = BisnisExpanditure::find($id);
        $data->update([
            'core_bisnis_id' => $request->core_bisnis_id,
            'sub_domain' => $request->sub_domain,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'kategori_id' => $request->kategori_id,
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
        ]);

        if ($data) {
            return redirect()->route('bisnisExpanditure')->with('success', 'data berhasil diupdate');
        } else {
            return redirect()->back()->with('error', 'data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BisnisExpanditure  $bisnisExpanditure
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = BisnisExpanditure::find($id);
        $data->delete();

        return redirect()->back()->with('success', 'data berhasil dihapus');
    }
}

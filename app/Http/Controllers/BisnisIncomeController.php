<?php

namespace App\Http\Controllers;

use App\Models\BisnisIncome;
use App\Models\CoreBisnis;
use Illuminate\Http\Request;

class BisnisIncomeController extends Controller
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
        $dataCoreBisnis = CoreBisnis::get(['id', 'nama_core_bisnis', 'divisi']);
        $data = BisnisIncome::with(['getCoreBisnis'])->get();

        return view('bisnisIncome.index', compact('dataCoreBisnis', 'data'));
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
        $data = BisnisIncome::create([
            'core_bisnis_id' => $request->core_bisnis_id,
            'sub_domain' => $request->sub_domain,
            'pendapatan' => str_replace('.', '', $request->pendapatan),
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'description' => $request->description
        ]);

        if ($data) {
            return redirect()->route('bisnisIncome')->with('success', 'data berhasil diinput');
        } else {
            return redirect()->back()->with('error', 'data gagal diinput');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BisnisIncome  $bisnisIncome
     * @return \Illuminate\Http\Response
     */
    public function show(BisnisIncome $bisnisIncome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BisnisIncome  $bisnisIncome
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataCoreBisnis = CoreBisnis::get(['id', 'nama_core_bisnis', 'divisi']);
        $data = BisnisIncome::find($id);

        return view('bisnisIncome.edit', compact('dataCoreBisnis', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BisnisIncome  $bisnisIncome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = BisnisIncome::find($id);
        $data->update([
            'core_bisnis_id' => $request->core_bisnis_id,
            'sub_domain' => $request->sub_domain,
            'pendapatan' => str_replace('.', '', $request->pendapatan),
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'description' => $request->description
        ]);

        if ($data) {
            return redirect()->route('bisnisIncome')->with('success', 'data berhasil di update');
        } else {
            return redirect()->back()->with('error', 'data gagal diupdate');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BisnisIncome  $bisnisIncome
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = BisnisIncome::find($id);
        $data->delete();

        return redirect()->back()->with('success','data berhasil dihapus');
    }
}

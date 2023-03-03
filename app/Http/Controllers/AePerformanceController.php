<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AeEmployee;
use App\Models\AePerformance;

class AePerformanceController extends Controller
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
        $dataAeEmployee  = AeEmployee::get(['id', 'name', 'divisi_id', 'core_bisnis_id']);
        $dataAePerformance = AePerformance::with(['getEmployee'])->latest('id')->get();
        return view ('aePerformance.index', compact('dataAeEmployee', 'dataAePerformance'));
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
        $dataAePerformance = aePerformance::create([
            'employee_id' => $request->employee_id,
            'target' => str_replace('.', '', $request->target),
            'pencapaian' => str_replace('.', '', $request->pencapaian),
            'tanggal' => $request->tanggal,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun
        ]);

        if ($dataAePerformance) {
            return redirect('aePerformance')->with('success', 'Data Berhasil Diinput');
        }
        else {
            return redirect()->route('aePerformance.index')->with('error', 'Data Gagal diinput');
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
        $dataAeEmployee = AeEmployee::get(['id', 'name', 'divisi_id', 'core_bisnis_id']);
        $dataAePerformance = AePerformance::findOrFail($id);

        return view('aePerformance.edit', compact('dataAeEmployee', 'dataAePerformance'));
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
        $dataAePerformance = AePerformance::findOrFail($id);
        $dataAePerformance->update([
            'employee_id' => $request->employee_id,
            'target' => str_replace('.', '', $request->target),
            'pencapaian' => str_replace('.', '', $request->pencapaian),
            'tanggal' => $request->tanggal,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun
        ]);

        if ($dataAePerformance) {
            # code...
            return redirect('aePerformance')->with('success', 'Data Berhasil Diupdate');
        }
        else {
            return redirect()->route('aePerformance.index')->with('error', 'Data Gagal Diupdate');
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
        $dataAePerformance = aePerformance::findOrFail($id);
        $dataAePerformance->delete();

        return redirect()->back()->with('status', 'Data Berhasil Dihapus');
    }
}

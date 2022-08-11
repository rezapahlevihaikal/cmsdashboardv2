<?php

namespace App\Http\Controllers;

use App\Models\PerformanceJprof;
use App\Models\CoreBisnisJprof;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PerformanceJprofController extends Controller
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
        $dataCoreBisnis = CoreBisnisJprof::get(['id', 'nama_core_jprof']);
        $dataPerformance = PerformanceJprof::with(['getCoreBisnis'])->get();

        return view('performanceJprof.index', compact('dataCoreBisnis', 'dataPerformance'));
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
        $month = Carbon::now()->format('F');
        $year = Carbon::now()->format('Y');

        $dataPerformance = PerformanceJprof::create([
            'produk' => $request->produk,
            'instansi' => $request->instansi,
            'pencapaian' => $request->pencapaian,
            'id_core_bisnis' => $request->id_core_bisnis,
            'bulan' => $month,
            'tahun' => $year
        ]);

        if ($dataPerformance) {
            return redirect()->route('performanceJprof')->withStatus('data berhasil diinput');
        }
        else {
            return redirect()->back()->withErrors('data gagal diinput');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Performance  $performance
     * @return \Illuminate\Http\Response
     */
    public function show(Performance $performance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Performance  $performance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataCoreBisnis = CoreBisnisJprof::get(['id', 'nama_core_bisnis']);
        $dataPerformance = PerformanceJprof::findOrFail($id);

        return view('performanceJprof.edit', compact('dataCoreBisnis', 'dataPerformance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Performance  $performance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataPerformance = PerformanceJprof::findOrFail($id);
        $dataPerformance->update([
            'produk' => $request->produk,
            'instansi' => $request->instansi,
            'pencapaian' => $request->pencapaian,
            'id_core_bisnis' => $request->id_core_bisnis,
        ]);

        if ($dataPerformance) {
            return redirect()->route('performanceJprof')->withStatus('data berhasil diinput');
        }
        else {
            return redirect()->back()->withErrors('data gagal diinput');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Performance  $performance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $dataPerformance = PerformanceJprof::findOrFail($id);
        $dataPerformance->delete();

        return redirect()->back()->withStatus('data berhasil dihapus');
    }
}

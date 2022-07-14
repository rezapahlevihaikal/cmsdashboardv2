<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Measurement;
use App\Models\CoreBisnis;

class MeasurementController extends Controller
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
        $dataMeasurement = Measurement::with(['getCoreBisnis'])->get();

        return view('measurement.index', compact('dataCoreBisnis', 'dataMeasurement'));
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
        $dataMeasurement = Measurement::create([
            'masa_kerja' => $request->masa_kerja,
            'target' => $request->target,
            'id_core_bisnis' => $request->id_core_bisnis
        ]);

        if ($dataMeasurement) {
            return redirect('measurement')->with('success', 'Data Berhasil Diinput');
        }
        else {
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
        $dataCoreBisnis = CoreBisnis::get(['id', 'nama_core_bisnis', 'divisi']);
        $dataMeasurement = Measurement::findOrFail($id);

        return view('measurement.edit', compact('dataCoreBisnis', 'dataMeasurement'));
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
        $dataMeasurement = Measurement::findOrFail($id);
        $dataMeasurement->update([
            'masa_kerja' => $request->masa_kerja,
            'target' => $request->target,
            'id_core_bisnis' => $request->id_core_bisnis
        ]);

        if ($dataMeasurement) {
            return redirect('measurement')->with('success', 'Data Berhasil Diupdate');
        }
        else {
            return redirect()->route('measurement.index')->with('error', 'Data Gagal Diupdate');
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
        $dataMeasurement = Measurement::findOrFail($id);
        $dataMeasurement->delete();

        return redirect()->back()->with('status', 'Data Berhasil Dihapus');
    }
}

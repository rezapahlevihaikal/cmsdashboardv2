<?php

namespace App\Http\Controllers;

use App\Models\Predictive;
use Illuminate\Http\Request;
use App\Models\CoreBisnis;
use App\Models\Partner;
use DB;

class PredictiveController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coreBisnis = CoreBisnis::get(['id', 'nama_core_bisnis', 'divisi']);
        $data = Predictive::all();
        return view('predictive.index', compact('coreBisnis','data'));
    }

    public function indexP()
    {
        $data = Partner::all();
        dd($data);
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
        $data = Predictive::create([
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
            'tema'  => $request->tema,
            'value' => str_replace('.', '', $request->value),
            'corebisnis' => $request->corebisnis
        ]);

        if ($data) {
            return redirect()->route('predictive')->withStatus('data berhasil diinput');
        }
        else {
            return redirect()->back()->withErrors('data gagal diinput');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Predictive  $predictive
     * @return \Illuminate\Http\Response
     */
    public function show(Predictive $predictive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Predictive  $predictive
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coreBisnis = CoreBisnis::get(['id', 'nama_core_bisnis', 'divisi']);
        $data = Predictive::find($id);
        return view('predictive.edit', compact('data', 'coreBisnis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Predictive  $predictive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Predictive::find($id);
        $data->update([
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
            'tema'  => $request->tema,
            'value' => str_replace('.', '', $request->value),
            'corebisnis' => $request->corebisnis 
        ]);

        if ($data) {
            return redirect()->route('predictive')->withStatus('data berhasil diinput');
        }
        else {
            return redirect()->back()->withErrors('data gagal diinput');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Predictive  $predictive
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Predictive::find($id);
        $data->delete();

        return redirect()->back()->withStatus('data berhasil dihapus');
    }
}

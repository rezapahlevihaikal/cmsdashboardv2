<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\Performance;
use App\Models\Divisi;
use App\Models\CoreBisnis;

class PerformanceController extends Controller
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
        // $divisi = Divisi::get('id','name');
        // $coreBisnis = CoreBisnis::where('id_divisi', $divisi->id)->get('name','id');
            $dataDivisi = Divisi::get(['id', 'nama_divisi']);
            $dataCoreBisnis = CoreBisnis::get(['id', 'nama_core_bisnis', 'divisi']);
            $dataPerformance = Performance::with(['getDivisi', 'getCoreBisnis'])->get();
            return view('performance.index', compact('dataPerformance', 'dataCoreBisnis', 'dataDivisi'));
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
        $validator = Performance::create([
            'divisi'=>$request->divisi,
            'core_bisnis'=>$request->core_bisnis,
            'target'=>$request->target,
            'pencapaian'=>$request->pencapaian,
            'value'=>$request->pencapaian/$request->target*100,
            'tanggal'=>$request->tanggal,
            'bulan'=>$request->bulan,
            'tahun'=>$request->tahun,
            'id_core_bisnis' => $request->id_core_bisnis,
            'id_divisi' => $request->id_divisi
        ]);
        
        if($validator){
            return redirect('performance')->with('success','Data Berhasil Diinput');
        }
        else{
            return redirect()->route('performance')->with('error','Data Gagal Diinput');
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
        $dataDivisi = Divisi::get(['id', 'nama_divisi']);
        $dataCoreBisnis = CoreBisnis::get(['id', 'nama_core_bisnis']);
        $dataPerformance = Performance::findOrFail($id);
        return view('performance.edit', compact('dataPerformance', 'dataCoreBisnis', 'dataDivisi'));
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
        $dataPerformance = Performance::findOrfail($id);
        $dataPerformance->update([
            'divisi' => $request->divisi,
            'core_bisnis' => $request->core_bisnis,
            'target' => $request->target,
            'pencapaian' => $request->pencapaian,
            'value'=>$request->pencapaian/$request->target*100,
            'tanggal' => $request->value,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'id_divisi' => $request->id_divisi,
            'id_core_bisnis' => $request->id_core_bisnis
        ]);

        if($dataPerformance){
            return redirect('performance')->with('success','Data Berhasil Diupdate');
        }
        else{
            return redirect()->route('performance.index')->with('error','Data Gagal Diinput');
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
        $dataPerformance = Performance::findOrFail($id);
            $dataPerformance->delete();

            return redirect()->back()->with('status','Success Deleted');
    }
}

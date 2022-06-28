<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoreBisnis;

class CoreBisnisController extends Controller
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
        $dataCoreBisnis = CoreBisnis::all();
        return view('coreBisnis.index', compact('dataCoreBisnis'));
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
        $dataCoreBisnis = CoreBisnis::create([
            'nama_core_bisnis' => $request->nama_core_bisnis,
            'divisi' => $request->divisi
        ]);
        
        if ($dataCoreBisnis) {
            # code...
            return redirect()->route('coreBisnis')->with('success', 'Data Berhasil Diinput');
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
        $dataCoreBisnis = CoreBisnis::findOrFail($id);
        return view('coreBisnis.edit', compact('dataCoreBisnis'));
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
        $dataCoreBisnis = CoreBisnis::findOrFail($id);
        $dataCoreBisnis->update([
            'nama_core_bisnis' => $request->nama_core_bisnis,
            'divisi' => $request->divisi
        ]);

        if($dataCoreBisnis)
        {
            return redirect()->route('coreBisnis')->with('success', 'Data Berhasil Di Update');
        }
        else
        {
            return redirect()->back()->with('success', 'Data Gagal Di Update');
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
        $dataCoreBisnis = CoreBisnis::findOrFail($id);
        $dataCoreBisnis->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}

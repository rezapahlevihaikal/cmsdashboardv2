<?php

namespace App\Http\Controllers;

use App\Models\CoreBisnisJprof;
use Illuminate\Http\Request;

class CoreBisnisJprofController extends Controller
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
        $dataCoreBisnisJ = CoreBisnisJprof::all();
        return view('coreBisnisJ.index', compact('dataCoreBisnisJ'));
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
        $dataCoreBisnisJ = CoreBisnisJprof::create([
            'nama_core_jprof' => $request->nama_core_jprof
        ]);

        if ($dataCoreBisnisJ) {
            return redirect('coreBisnisJprof')->withStatus('data berhasil diinput');
        }
        else {
            return redirect()->back()->withStatus('data gagal diinput');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CoreBisnis  $coreBisnis
     * @return \Illuminate\Http\Response
     */
    public function show(CoreBisnis $coreBisnis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoreBisnis  $coreBisnis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataCoreBisnisJ = CoreBisnisJprof::findOrFail($id);

        return view('coreBisnisJ.edit', compact('dataCoreBisnisJ'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CoreBisnis  $coreBisnis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataCoreBisnisJ = CoreBisnisJprof::findOrFail($id);
        $dataCoreBisnisJ->update([
            'nama_core_jprof' => $request->nama_core_jprof
        ]);

        if ($dataCoreBisnisJ) {
            return redirect('coreBisnisJprof')->withStatus('data berhasil diupdate');
        }
        else {
            return redirect()->back()->withStatus('data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoreBisnis  $coreBisnis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataCoreBisnisJ = CoreBisnisJprof::findOrFail($id);
        $dataCoreBisnisJ->delete();

        return redirect()->back()->withStatus('data berhasil dihapus');
    }
}

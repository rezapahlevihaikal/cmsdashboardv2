<?php

namespace App\Http\Controllers;

use App\Models\MasterExpanditure;
use Illuminate\Http\Request;

class MasterExpanditureController extends Controller
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
        $data = MasterExpanditure::all();
        return view('mst_expanditure.index', compact('data'));
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
        $data = MasterExpanditure::create([
            'kategori' => $request->kategori,
            'name' => $request->name
        ]);

        if ($data) {
            return redirect()->route('mst_expanditure')->with('success','data berhasil diinput');
        } else {
            return redirect()->back()->with('error', 'data gagal diinput');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterExpanditure  $masterExpanditure
     * @return \Illuminate\Http\Response
     */
    public function show(MasterExpanditure $masterExpanditure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterExpanditure  $masterExpanditure
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = MasterExpanditure::find($id);

        return view('mst_expanditure.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterExpanditure  $masterExpanditure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = MasterExpanditure::find($id);
        $data->update([
            'kategori' => $request->kategori,
            'name' => $request->name
        ]);

        if ($data) {
            return redirect()->route('mst_expanditure')->with('success', 'data berhasil diupdate');
        } else {
            return redirect()->back()->with('error', 'data gagal diupdate');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterExpanditure  $masterExpanditure
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = MasterExpanditure::find($id);
        $data->delete();

        return redirect()->back()->with('success', 'data berhasil dihapus');
    }
}

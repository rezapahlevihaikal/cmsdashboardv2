<?php

namespace App\Http\Controllers;

use App\Models\ProductBisnis;
use App\Models\KategoriBisnis;
use Illuminate\Http\Request;

class ProductBisnisController extends Controller
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
        $kategoriBisnis = KategoriBisnis::get(['id', 'nama_kategori']);
        $data = ProductBisnis::with(['getKategori'])->get();

        return view('productBisnis.index', compact('kategoriBisnis', 'data'));
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
        $data = ProductBisnis::create([
            'kategori_id' => $request->kategori_id,
            'nama_product' => $request->nama_product,
            'keterangan' => $request->keterangan
        ]);

        if ($data) {
            return redirect()->route('productBisnis')->with('success', 'data berhasil diinput');
        } else {
            return redirect()->back()->with('error', 'data gagal diinput');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductBisnis  $productBisnis
     * @return \Illuminate\Http\Response
     */
    public function show(ProductBisnis $productBisnis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductBisnis  $productBisnis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategoriBisnis = KategoriBisnis::get(['id', 'nama_kategori']);
        $data = ProductBisnis::find($id);

        return view('productBisnis.edit', compact('kategoriBisnis', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductBisnis  $productBisnis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = ProductBisnis::find($id);
        $data->update([
            'kategori_id' => $request->kategori_id,
            'nama_product' => $request->nama_product,
            'keterangan' => $request->keterangan
        ]); 

        if ($data) {
            return redirect()->route('productBisnis')->with('success', 'data berhasil diupdate');
        } else {
            return redirect()->back()->with('error', 'data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductBisnis  $productBisnis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = ProductBisnis::find($id);
        $data->delete();

        return redirect()->back()->with('status','Success Deleted');
    }
}

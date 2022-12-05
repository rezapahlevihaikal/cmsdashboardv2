<?php

namespace App\Http\Controllers;

use App\Models\KategoriBisnis;
use Illuminate\Http\Request;

class KategoriBisnisController extends Controller
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
        $data = KategoriBisnis::all();
        return view('kategoriBisnis.index', compact('data'));
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
        $data = KategoriBisnis::create([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan
        ]);

        if($data)
        {
            return redirect()->route('kategoriBisnis')->with('success', 'data berhasil diinput');
        }
        else {
            return redirect()->back()->with('error', 'data gagal diinput');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriBisnis  $kategoriBisnis
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriBisnis $kategoriBisnis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriBisnis  $kategoriBisnis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = KategoriBisnis::find($id);
        return view('kategoriBisnis.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriBisnis  $kategoriBisnis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = KategoriBisnis::find($id);
        $data->update([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan
        ]);

        if ($data) {
            return redirect()->route('kategoriBisnis')->with('success', 'data berhasil diupdate');
        } else {
            return redirect()->back()->with('error', 'data gagal diupdate');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriBisnis  $kategoriBisnis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = KategoriBisnis::find($id);
        $data->delete();

        return redirect()->back()->with('status','Success Deleted');
    }
}

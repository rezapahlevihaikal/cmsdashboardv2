<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PicEvent;

class PicController extends Controller
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
        $dataPic = PicEvent::all();
        return view('picEvent.index', compact('dataPic'));
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
        $dataPic = PicEvent::create([
            'nama_pic' => $request->nama_pic,
            'divisi' => $request->divisi
        ]);

        if ($dataPic) 
        {
            # code...
            return redirect()->route('picEvent')->with('success', 'Data Berhasil Diinput');
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
        $dataPic = PicEvent::findOrFail($id);
        return view('picEvent.edit', compact('dataPic'));
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
        $dataPic = PicEvent::findOrFail($id);
        return view('picEvent.edit', compact('dataPic'));
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
        $dataPic = PicEvent::findOrFail($id);
        $dataPic->update([
            'nama_pic' => $request->nama_pic,
            'divisi' => $request->divisi
        ]);

        if ($dataPic) {
            # code...
            return redirect('picEvent')->with('success', 'Data Berhasil Di update');
        }
        else
        {
            return redirect()->back()->with('error', 'Data Gagal Diupdate');
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
        $dataPic = PicEvent::findOrFail($id);
        $dataPic->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}

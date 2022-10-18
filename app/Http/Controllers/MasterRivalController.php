<?php

namespace App\Http\Controllers;

use App\Models\MasterRival;
use App\Models\Rivalities;
use Illuminate\Http\Request;

class MasterRivalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rivalities = Rivalities::get(['id', 'name']);
        $dataRival = MasterRival::with(['getRival'])->get();

        return view('rivality.index', compact('rivalities', 'dataRival'));
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
        $dataRival = MasterRival::create([
            'rivalities_id' => $request->rivalities_id,
            'value' => $request->value
        ]);

        if ($dataRival) {
            return redirect()->route('rivality')->with('success', 'data berhasil diinput');
        } else {
            return redirect()->back()->with('error', 'data gagal diinput');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterRival  $masterRival
     * @return \Illuminate\Http\Response
     */
    public function show(MasterRival $masterRival)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterRival  $masterRival
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rivalities = Rivalities::get(['id', 'name']);
        $dataRival = MasterRival::findOrFail($id);

        return view('rivality.edit', compact('rivalities', 'dataRival'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterRival  $masterRival
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $dataRival = MasterRival::findOrFail($id);
        $dataRival->update([
            'rivalities_id' => $request->rivalities_id,
            'value' => $request->value
        ]);
        
        if ($dataRival) {
            return redirect()->route('rivality')->with('success', 'data berhasil di update');
        } else {
            return redirect()->back()->with('error', 'data gagal diupdate');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterRival  $masterRival
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $dataRival = MasterRival::findOrFail($id);
        $dataRival->delete();

        return redirect()->back()->with('success', 'data berhasil dihapus');
    }
}

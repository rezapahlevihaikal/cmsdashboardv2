<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusEvent;

class StatusEventController extends Controller
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
        $dataStatus = StatusEvent::all();
        return view ('statusEvent.index', compact('dataStatus'));
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
        $dataStatus = StatusEvent::create([
            'nama_status' => $request->nama_status
        ]);

        if($dataStatus)
        {
            return redirect()->route('statusEvent')->with('success', 'Data Berhasil Diinput');
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
        $dataStatus = StatusEvent::findOrFail($id);
        return view('statusEvent.edit', compact('dataStatus'));
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
        $dataStatus = StatusEvent::findOrFail($id);
        $dataStatus->update([
            'nama_status' => $request->nama_status
        ]);

        if($dataStatus)
        {
            return redirect()->route('statusEvent')->with('sucess', 'Data Berhasil Diupdate');
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
        $dataStatus = StatusEvent::findOrFail($id);
        $dataStatus->delete();

        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }
}

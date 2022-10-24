<?php

namespace App\Http\Controllers;

use App\Models\Programmatics;
use App\Models\MasterWebsite;
use Illuminate\Http\Request;

class ProgrammaticsController extends Controller
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
        $dataWebsite = MasterWebsite::get(['id','website_name']);
        $dataProg = Programmatics::with(['getWebsite'])->get();

        return view('prog.index', compact('dataWebsite', 'dataProg'));
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
        $dataProg = Programmatics::create([
            'dataadd' => $request->dataadd,
            'views' => $request->views,
            'clicks' => $request->clicks,
            'cpc' => $request->cpc,
            'ctr' => $request->ctr,
            'cpm' => $request->cpm,
            'laba' => $request->laba,
            'website' => $request->website
        ]);

        if($dataProg)
        {
            return redirect('programmatics')->with('success', 'Data Berhasil Diinput');
        }
        else
        {
            return redirect()->back()->with('error', 'Data Gagal Diinput');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Programmatics  $programmatics
     * @return \Illuminate\Http\Response
     */
    public function show(Programmatics $programmatics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programmatics  $programmatics
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataWebsite = MasterWebsite::get(['id', 'website_name']);
        $dataProg = Programmatics::find($id);

        return view('prog.edit', compact('dataWebsite', 'dataProg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programmatics  $programmatics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataProg = Programmatics::find($id);
        $dataProg->update([
            'dataadd' => $request->dataadd,
            'views' => $request->views,
            'clicks' => $request->clicks,
            'cpc' => $request->cpc,
            'ctr' => $request->ctr,
            'cpm' => $request->cpm,
            'laba' => $request->laba,
            'website' => $request->website
        ]);

        if($dataProg)
        {
            return redirect('programmatics')->with('success', 'Data Berhasil Diupdate');
        }
        else
        {
            return redirect()->back()->with('error', 'Data Gagal Diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Programmatics  $programmatics
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $dataProg = Programmatics::find($id);
        $dataProg->delete();

        return redirect()->back()->with('status', 'Data Berhasil Dihapus');
    }
}

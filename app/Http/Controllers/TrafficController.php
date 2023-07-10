<?php

namespace App\Http\Controllers;

use App\Models\Traffic;
use App\Models\MasterWebsite;
use Illuminate\Http\Request;

class TrafficController extends Controller
{
    public function __cosntruct()
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
        $website = MasterWebsite::get(['id', 'website_name']);
        $data = Traffic::with('getWebsite')->latest('tanggal')->get();

        return view('traffic.index', compact('website', 'data'));
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
        $data = Traffic::create([
            'website_id' => $request->website_id,
            'tanggal' => $request->tanggal,
            'pageview' => str_replace('.', '', $request->pageview),
            'user' => str_replace('.', '', $request->user),
        ]);

        if($data)
        {
            return redirect()->route('traffic')->with('success','Data Berhasil ditambah');
        }
        else
        {
            return redirect()->route('traffic')->with('error','Data Gagal Diinput');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Traffic  $traffic
     * @return \Illuminate\Http\Response
     */
    public function show(Traffic $traffic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Traffic  $traffic
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $website = MasterWebsite::get(['id', 'website_name']);
        $data = Traffic::find($id);

        return view('traffic.edit', compact('website', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Traffic  $traffic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = Traffic::find($id);
        $data->update([
            'website_id' => $request->website_id,
            'tanggal' => $request->tanggal,
            'pageview' => str_replace('.', '', $request->pageview),
            'user' => str_replace('.', '', $request->user),
        ]);

        if($data)
        {
            return redirect()->route('traffic')->with('success','Data Berhasil Diupdate');
        }
        else
        {
            return redirect()->route('traffic')->with('error','Data Gagal Diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Traffic  $traffic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Traffic::find($id);
        $data->delete();

        return redirect()->back()->with('status', 'Data Berhasil Dihapus');
    }
}

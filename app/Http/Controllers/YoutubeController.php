<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\Youtube;
use App\Models\YtRank;
use App\Models\MasterWebsite;

class YoutubeController extends Controller
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
        $dataWebsite = MasterWebsite::get(['id', 'website_name']);
        $dataYoutube = YtRank::with(['getWebsite'])->latest('dataadd')->get();
        return view('youtube.index', compact('dataYoutube', 'dataWebsite'));
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
        $validator = YtRank::create([
            'dataadd' => $request->dataadd,
            'website_id' => $request->website_id,
            'rank' => $request->rank
        ]);
        if($validator)
        {
            return redirect()->route('youtube')->with('success','Data Berhasil ditambah');
        }
        else
        {
            return redirect()->route('youtube')->with('error','Data Gagal Diinput');
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
        $dataWebsite = MasterWebsite::get(['id', 'website_name']);
        $dataYoutube = YtRank::findOrFail($id);
        return view('youtube.edit', compact('dataYoutube', 'dataWebsite'));   
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
            $dataYoutube = YtRank::findOrFail($id);
            $dataYoutube->update([
                'dataadd' => $request->dataadd,
                'website_id' => $request->website_id,
                'rank' => $request->rank
            ]);

            if($dataYoutube){
                return redirect()->route('youtube')->with('success','Data Berhasil Diupdate');
            }
            else{
                return redirect()->route('youtube')->with('error','Data Gagal Diinput');
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
        $dataWebsite = YtRank::findOrFail($id);
        $dataWebsite->delete();

        return redirect()->back()->with('Status', 'Data Sukses di Hapus');
    }
}

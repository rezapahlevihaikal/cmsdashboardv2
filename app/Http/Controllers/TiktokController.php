<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Tiktok;
use App\Models\TikRank;
use App\Models\MasterWebsite;

class TiktokController extends Controller
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
        $dataTiktok = TikRank::with(['getWebsite'])->latest('dataadd')->get();

        return view('tiktok.index', compact('dataTiktok', 'dataWebsite'));
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
        $validator = TikRank::create([
            'dataadd' => $request->dataadd,
            'website_id' => $request->website_id,
            'rank' => $request->rank
        ]);
        if($validator)
        {
            return redirect()->route('tiktok')->with('success','Data Berhasil ditambah');
        }
        else
        {
            return redirect()->route('tiktok')->with('error','Data Gagal Diinput');
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
            $dataTiktok = TikRank::findOrFail($id);
            return view('tiktok.edit', compact('dataTiktok', 'dataWebsite'));
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
            $dataTiktok = TikRank::findOrFail($id);
            $dataTiktok->update([
                'dataadd' => $request->dataadd,
                'website_id' => $request->website_id,
                'rank' => $request->rank
            ]);

            if($dataTiktok){
                return redirect()->route('tiktok')->with('success','Data Berhasil Diupdate');
            }
            else{
                return redirect()->route('tiktok')->with('error','Data Gagal Diinput');
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
            $dataTiktok = TikRank::findOrFail($id);
            $dataTiktok->delete();

            return redirect()->back()->with('status','Success Deleted');
    }
}

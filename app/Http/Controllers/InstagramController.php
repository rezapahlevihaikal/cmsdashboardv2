<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\IgRank;
use App\Models\MasterWebsite;

class InstagramController extends Controller
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
        $dataInstagram = IgRank::with(['getWebsite'])->latest('dataadd')->get();

        return view('instagram.index', compact('dataInstagram', 'dataWebsite'));
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
        $validator = IgRank::create([
            'dataadd' => $request->dataadd,
            'website_id' => $request->website_id,
            'rank' => $request->rank
        ]);
        if($validator)
        {
            return redirect()->route('instagram')->with('success','Data Berhasil ditambah');
        }
        else
        {
            return redirect()->route('instagram')->with('error','Data Gagal Diinput');
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
        $dataInstagram = IgRank::findOrFail($id);
        return view('instagram.edit', compact('dataInstagram','dataWebsite'));
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
            $dataInstagram = IgRank::findOrFail($id);
            $dataInstagram->update([
                'dataadd' => $request->dataadd,
                'website_id' => $request->website_id,
                'rank' => $request->rank
            ]);

            if($dataInstagram){
                return redirect()->route('instagram')->with('success','Data Berhasil Diupdate');
            }
            else{
                return redirect()->route('instagram')->with('error','Data Gagal Diinput');
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
            $dataInstagram = IgRank::findOrFail($id);
            $dataInstagram->delete();

            return redirect()->back()->with('status','Success Deleted');
    }
}

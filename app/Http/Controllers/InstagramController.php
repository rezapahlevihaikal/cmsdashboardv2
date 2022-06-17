<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Instagram;

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
        $dataInstagram = DB::table('instagram_ranks')
        ->select('*')
        ->get();

        return view('instagram.index', compact('dataInstagram'));
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
        $validator = Instagram::create([
            'ig_we_rank' => $request->ig_we_rank,
            'ig_hs_rank' => $request->ig_hs_rank,
            'ig_populis_rank' => $request->ig_populis_rank,
            'ig_konten_jatim_rank' => $request->ig_konten_jatim_rank,
            'ig_we_nilai' => $request->ig_we_nilai,
            'ig_hs_nilai' => $request->ig_hs_nilai,
            'ig_populis_nilai' => $request->ig_populis_nilai,
            'ig_konten_jatim_nilai' => $request->ig_konten_jatim_nilai
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
        $dataInstagram = Instagram::findOrFail($id);
        return view('instagram.edit', compact('dataInstagram'));
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
            $dataInstagram = Instagram::findOrFail($id);
            $dataInstagram->update([
                'ig_we_rank' => $request->ig_we_rank,
                'ig_hs_rank' => $request->ig_hs_rank,
                'ig_populis_rank' => $request->ig_populis_rank,
                'ig_konten_jatim_rank' => $request->ig_konten_jatim_rank,
                'ig_we_nilai' => $request->ig_we_nilai,
                'ig_hs_nilai' => $request->ig_hs_nilai,
                'ig_populis_nilai' => $request->ig_populis_nilai,
                'ig_konten_jatim_nilai' => $request->ig_konten_jatim_nilai
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
            $dataInstagram = Instagram::findOrFail($id);
            $dataInstagram->delete();

            return redirect()->back()->with('status','Success Deleted');
    }
}

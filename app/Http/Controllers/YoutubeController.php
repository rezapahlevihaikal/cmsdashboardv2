<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\Youtube;

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
        $dataYoutube = DB::table('youtube_ranks')
        ->select('*')
        ->get();
        return view('youtube.index', compact('dataYoutube'));
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
        $validator = Youtube::create([
            'yt_we_rank' => $request->yt_we_rank,
            'yt_hs_rank' => $request->yt_hs_rank,
            'yt_populis_rank' => $request->yt_populis_rank,
            'yt_konten_jatim_rank' => $request->yt_konten_jatim_rank,
            'yt_we_nilai' => $request->yt_we_nilai,
            'yt_hs_nilai' => $request->yt_hs_nilai,
            'yt_populis_nilai' => $request->yt_populis_nilai,
            'yt_konten_jatim_nilai' => $request->yt_konten_jatim_nilai
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
        $dataYoutube = Youtube::findOrFail($id);
        return view('youtube.edit', compact('dataYoutube'));   
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
            $dataYoutube = Youtube::findOrFail($id);
            $dataYoutube->update([
                'yt_we_rank' => $request->yt_we_rank,
                'yt_hs_rank' => $request->yt_hs_rank,
                'yt_populis_rank' => $request->yt_populis_rank,
                'yt_konten_jatim_rank' => $request->yt_konten_jatim_rank,
                'yt_we_nilai' => $request->yt_we_nilai,
                'yt_hs_nilai' => $request->yt_hs_nilai,
                'yt_populis_nilai' => $request->yt_populis_nilai,
                'yt_konten_jatim_nilai' => $request->yt_konten_jatim_nilai
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
        $dataWebsite = Youtube::findOrFail($id);
        $dataWebsite->delete();

        return redirect()->back()->with('Status', 'Data Sukses di Hapus');
    }
}

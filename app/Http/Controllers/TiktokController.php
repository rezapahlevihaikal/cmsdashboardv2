<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Tiktok;

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
        $dataTiktok = DB::table('tiktok_ranks')
        ->select("*")
        ->get();

        return view('tiktok.index', compact('dataTiktok'));
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
        $validator = Tiktok::create([
            'tiktok_we_rank' => $request->tiktok_we_rank,
            'tiktok_hs_rank' => $request->tiktok_hs_rank,
            'tiktok_populis_rank' => $request->tiktok_populis_rank,
            'tiktok_konten_jatim_rank' => $request->tiktok_konten_jatim_rank,
            'tiktok_we_nilai' => $request->tiktok_we_nilai,
            'tiktok_hs_nilai' => $request->tiktok_hs_nilai,
            'tiktok_populis_nilai' => $request->tiktok_populis_nilai,
            'tiktok_konten_jatim_nilai' => $request->tiktok_konten_jatim_nilai
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
            $dataTiktok = Tiktok::findOrFail($id);
            return view('tiktok.edit', compact('dataTiktok'));
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
            $dataTiktok = Tiktok::findOrFail($id);
            $dataTiktok->update([
                'tiktok_we_rank' => $request->tiktok_we_rank,
                'tiktok_hs_rank' => $request->tiktok_hs_rank,
                'tiktok_populis_rank' => $request->tiktok_populis_rank,
                'tiktok_konten_jatim_rank' => $request->tiktok_konten_jatim_rank,
                'tiktok_we_nilai' => $request->tiktok_we_nilai,
                'tiktok_hs_nilai' => $request->tiktok_hs_nilai,
                'tiktok_populis_nilai' => $request->tiktok_populis_nilai,
                'tiktok_konten_jatim_nilai' => $request->tiktok_konten_jatim_nilai
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
            $dataTiktok = Tiktok::findOrFail($id);
            $dataTiktok->delete();

            return redirect()->back()->with('status','Success Deleted');
    }
}

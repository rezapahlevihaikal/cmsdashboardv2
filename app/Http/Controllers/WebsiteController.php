<?php

namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Website;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $dataWebsite = DB::table('web_rank')
        ->select("*")
        ->get();

        return view('smiliarweb.website', compact('dataWebsite'));
    }

    // public function json()
    // {
    //     return DataTables::of(Website::limit(10))->make(true);
    // }

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
        $validator = Website::create([
            'tanggal' => $request->tanggal,
            'we'=>$request->we,
            'hs'=>$request->hs,
            'populis'=>$request->populis,
            'konten_jatim'=>$request->konten_jatim,
            'lastupdate'=>Carbon::now(),
            'we_tv'=>$request->we_tv,
            'we_nilai'=>$request->we_nilai,
            'hs_nilai'=>$request->hs_nilai,
            'populis_nilai'=>$request->populis_nilai,
            'konten_jatim_nilai'=>$request->konten_jatim_nilai,
            'tv_nilai'=>$request->tv_nilai
        ]);

        if($validator){
            return redirect('website')->with('success','Data Berhasil Diinput');
        }
        else{
            return redirect()->route('website')->with('error','Data Gagal Diinput');
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
        $dataWebsite = Website::findOrFail($id);
        return view('smiliarweb.edit', compact('dataWebsite'));
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
        $dataWebsite = Website::findOrFail($id);
        $dataWebsite->update([
                'tanggal' => $request->tanggal,
                'we'=>$request->we,
                'hs'=>$request->hs,
                'populis'=>$request->populis,
                'konten_jatim'=>$request->konten_jatim,
                'lastupdate'=>Carbon::now(),
                'we_tv'=>$request->we_tv,
                'we_nilai'=>$request->we_nilai,
                'hs_nilai'=>$request->hs_nilai,
                'populis_nilai'=>$request->populis_nilai,
                'konten_jatim_nilai'=>$request->konten_jatim_nilai,
                'tv_nilai'=>$request->tv_nilai
        ]);
        
        if ($dataWebsite) {
            # code...
            return redirect('website')->with('success', 'Data Berhasil di Update');
        }
        else {
            return redirect()->route('website')->with('error', 'Data gagal di Update');
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
        $dataWebsite = Website::findOrFail($id);
        $dataWebsite->delete();

        return redirect()->back()->with('Status', 'Data Sukses di Hapus');
    }
}
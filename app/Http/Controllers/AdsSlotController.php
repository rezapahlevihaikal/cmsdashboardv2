<?php

namespace App\Http\Controllers;

use App\Models\AdsSlot;
use App\Models\MasterWebsite;
use App\Models\MasterPartner;
use Illuminate\Http\Request;

class AdsSlotController extends Controller
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
        $dataWebsite = MasterWebsite::get(['id', 'website_name']);
        $dataPartner = MasterPartner::get(['id', 'name']);
        $dataAdsSlot = AdsSlot::with([
                       'getWebsite', 
                       'getMobTop',
                       'getMobInArt1',
                       'getMobInArt2',
                       'getMobInArt3',
                       'getStickBot',
                       'getMobImage',
                       'getMobNative',
                       'getMobVid'])->get();

        return view('adsSlot.index', compact('dataWebsite', 'dataPartner', 'dataAdsSlot'));
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
        // dd($request->all());
        $dataAdsSlot = AdsSlot::create([
            'website_id' => $request->website_id,
            'mob_top' => $request->mob_top,
            'mob_in_article1' => $request->mob_in_article1,
            'mob_in_article2' => $request->mob_in_article2,
            'mob_in_article3' => $request->mob_in_article3,
            'mob_sticky_bottom' => $request->mob_sticky_bottom,
            'mob_in_imagebanner' => $request->mob_in_imagebanner,
            'mob_nativead' => $request->mob_nativead,
            'mob_video' => $request->mob_video
        ]);

        if($dataAdsSlot)
        {
            return redirect('ads_slot')->with('success', 'Data Berhasil Diinput');
        }
        else
        {
            return redirect()->back()->with('error', 'Data Gagal Diinput');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdsSlot  $adsSlot
     * @return \Illuminate\Http\Response
     */
    public function show(AdsSlot $adsSlot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdsSlot  $adsSlot
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $dataWebsite = MasterWebsite::get(['id', 'website_name']);
        $dataPartner = MasterPartner::get(['id', 'name']);
        $dataAdsSlot = AdsSlot::find($id);

        return view('adsSlot.edit', compact('dataWebsite', 'dataPartner', 'dataAdsSlot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdsSlot  $adsSlot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataAdsSlot = AdsSlot::find($id);
        $dataAdsSlot->update([
            'website_id' => $request->website_id,
            'mob_top' => $request->mob_top,
            'mob_in_article1' => $request->mob_in_article1,
            'mob_in_article2' => $request->mob_in_article2,
            'mob_in_article3' => $request->mob_in_article3,
            'mob_sticky_bottom' => $request->mob_sticky_bottom,
            'mob_in_imagebanner' => $request->mob_in_imagebanner,
            'mob_nativead' => $request->mob_nativead,
            'mob_video' => $request->mob_video
        ]);

        if($dataAdsSlot)
        {
            return redirect('ads_slot')->with('success', 'Data Berhasil Diupdate');
        }
        else
        {
            return redirect()->back()->with('error', 'Data Gagal Diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdsSlot  $adsSlot
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataAds = AdsSlot::find($id);
        $dataAds->delete();

        return redirect()->back()->with('status', 'Data Berhasil Dihapus');
    }
}

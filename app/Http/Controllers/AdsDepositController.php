<?php

namespace App\Http\Controllers;

use App\Models\AdsDeposit;
use App\Models\MasterWebsite;
use Illuminate\Http\Request;

class AdsDepositController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dataWebsite = MasterWebsite::get(['id', 'website_name']);
        $dataAds = AdsDeposit::with(['getWebsite'])->get();
        return view('ads.index', compact('dataWebsite','dataAds'));
    }

    public function store(Request $request)
    {
        $dataAds = AdsDeposit::create([
            'website' => $request->website,
            'deposit' => $request->deposit,
            'tanggal_deposit' => $request->tanggal_deposit,
            'status' => $request->status,
            'tanggal_habis' => $request->tanggal_habis,
            'sisa_slot' => $request->sisa_slot
        ]);

        if($dataAds)
        {
            return redirect('ads')->with('success', 'Data Berhasil Diinput');
        }
        else
        {
            return redirect()->back()->with('error', 'Data Gagal Diinput');
        }
    }

    public function edit($id)
    {
        $dataWebsite = MasterWebsite::get(['id', 'website_name']);
        $dataAds = AdsDeposit::find($id);
        return view('ads.edit', compact('dataWebsite','dataAds'));
    }

    public function update(Request $request, $id)
    {
        $dataAds = AdsDeposit::find($id);
        $dataAds->update([
            'website' => $request->website,
            'deposit' => $request->deposit,
            'tanggal_deposit' => $request->tanggal_deposit,
            'status' => $request->status,
            'tanggal_habis' => $request->tanggal_habis,
            'sisa_slot' => $request->sisa_slot
        ]);

        if ($dataAds) {
            return redirect('ads')->with('success', 'Data Berhasil Diupdate');
        }
        else {
            return redirect()->back()->with('error', 'Data Gagal Diupdate');
        }
    }

    public function destroy($id)
    {
        //
        $dataAds = AdsDeposit::find($id);
        $dataAds->delete();

        return redirect()->back()->with('status', 'Data Berhasil Dihapus');
    }
}

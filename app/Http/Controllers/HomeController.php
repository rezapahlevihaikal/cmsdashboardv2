<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (Auth::user()->role_user == 'adminwe') {
            $wartaEkonomi = DB::table('web_rank')
                            ->select('tanggal', 'we')
                            ->get();

            foreach ($wartaEkonomi as $key) {
                    $tanggalWe[] = date('d-M', strtotime($key->tanggal));
                    $rankWe[] = $key->we;
            }


            $herStory = DB::table('web_rank')
                        ->select('tanggal', 'hs')
                        ->get();

            foreach ($herStory as $key) {
                # code...
                $tanggalHs[] = date('d-M', strtotime($key->tanggal));
                $rankHs[] = $key->hs;
            }


            $populis = DB::table('web_rank')
                        ->select('tanggal', 'populis')
                        ->get();

            foreach ($populis as $key) {
                # code...
                $tanggalPop[] = date('d-M', strtotime($key->tanggal));
                $rankPop[] = $key->populis;
            }

            $topRanks = DB::table('web_rank')
                        ->select('we', 'hs', 'populis', 'tanggal')
                        ->orderBy('tanggal','desc')
                        ->first();

            return view('dashboard', compact('wartaEkonomi','herStory','populis','topRanks'))
            ->with('tanggalWe',json_encode($tanggalWe))
            ->with('rankWe',json_encode($rankWe,JSON_NUMERIC_CHECK))
            ->with('tanggalHs',json_encode($tanggalHs))
            ->with('rankHs',json_encode($rankHs,JSON_NUMERIC_CHECK))
            ->with('tanggalPop',json_encode($tanggalHs))
            ->with('rankPop',json_encode($rankPop,JSON_NUMERIC_CHECK));
            
        } elseif(Auth::user()->role_user == 'adminjprof') {
            return view('dashboardJprof');
        } elseif(Auth::user()->role_user == 'adminAds') {
            return view('dashboardAds');
        }
        
    }


    // public function cards()
    // {
    //     $dataRanks = DB::table('web_rank')
    //                  ->select('we', 'hs', 'populis', 'tanggal')
    //                  ->orderBy('tanggal', 'desc')
    //                  ->first();

    //     return view('layouts.headers.cards', compact('dataRanks'));
    // }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\Event;

class EventController extends Controller
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
            $dataEvents = DB::table('cal_event')
            ->select('*')
            ->get();
            return view('event.index', compact('dataEvents'));
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
        $validator = Event::create([
            'tanggal' => $request->tanggal,
            'start_time' => $request->start_time,
            'finish_time' => $request->finish_time,
            'venue' => $request->venue,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'pic' => $request->pic,
            'lastupdate' => Carbon::now(),
            'status' => $request->status
        ]);

        if($validator)
        {
            return redirect('events')->with('success','Data Berhasil ditambah');
        }
        else
        {
            return redirect()->route('events.index')->with('error','Data Gagal Diinput');
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
        $dataEvents = Event::findOrFail($id);
            return view('event.edit', compact('dataEvents')); 
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
            $dataEvents = Event::findOrFail($id);
            $dataEvents->update([
                'tanggal' => $request->tanggal,
                'start_time' => $request->start_time,
                'finish_time' => $request->finish_time,
                'venue' => $request->venue,
                'deskripsi' => $request->deskripsi,
                'kategori' => $request->kategori,
                'pic' => $request->pic,
                'lastupdate' => Carbon::now(),
                'status' => $request->status
            ]);

            if($dataEvents){
                return redirect('events')->with('success','Data Berhasil Diupdate');
            }
            else{
                return redirect()->route('events.index')->with('error','Data Gagal Diinput');
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
            $dataEvents = Event::findOrFail($id);
            $dataEvents->delete();

            return redirect()->back()->with('status','Success Deleted');
    }
}

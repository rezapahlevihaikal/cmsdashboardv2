<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\PicEvent;
use App\Models\StatusEvent;
use App\Models\Performance;

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
            
            $dataKategori = EventCategory::get(['id', 'nama_kategori']);
            $dataPicEvent = PicEvent::get(['id', 'nama_pic', 'divisi']);
            $dataStatusEvent = StatusEvent::get(['id', 'nama_status']);
            $dataEvents = Event::with(['cat','pic_name', 'stat2'])->get();
           
            return view('event.index', compact('dataEvents', 'dataKategori', 'dataStatusEvent', 'dataPicEvent'));
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
            'status' => $request->status,
            'id_kategori' => $request->id_kategori,
            'id_status' => $request->id_status,
            'id_pic' => $request->id_pic,
            'cost' => $request->cost,
            'revenue' => $request->revenue
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
        $dataKategori = EventCategory::get(['id', 'nama_kategori']);
        $dataPicEvent = PicEvent::get(['id', 'nama_pic']);
        $dataStatusEvent = StatusEvent::get(['id', 'nama_status']);
        $dataEvents = Event::findOrFail($id);
            return view('event.edit', compact('dataEvents','dataKategori', 'dataPicEvent', 'dataStatusEvent')); 
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
                'id_kategori' => $request->id_kategori,
                'id_status' => $request->id_status,
                'id_pic' => $request->id_pic,
                'pic' => $request->pic,
                'lastupdate' => Carbon::now(),
                'status' => $request->status,
                'cost' => $request->cost,
                'revenue' => $request->revenue
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\EventCategory;

class EventCategoryController extends Controller
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
        $dataKategori = EventCategory::all();
        return view('eventCategory.index', compact('dataKategori'));
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
        $validator = EventCategory::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        if($validator)
        {
            return redirect()->route('eventCategory')->with('success', 'Data Berhasil ditambah');
        }
        else
        {
            return redirect()->back()->with('error','Data Gagal Diinput');
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
        $dataKategori = EventCategory::findOrFail($id);
        return view('eventCategory.edit', compact('dataKategori'));
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
        $dataKategori = EventCategory::findOrFail($id);
        $dataKategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        if($dataKategori){
            return redirect('eventCategory')->with('success','Data Berhasil Diinput');
        }
        else{
            return redirect()->route('eventCategory')->with('error', 'Data Gagal Diinput');
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
            $dataKategori = EventCategory::findOrFail($id);
            $dataKategori->delete();

            return redirect()->back()->with('status','Success Deleted');
    }
}

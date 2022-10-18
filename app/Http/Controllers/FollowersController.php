<?php

namespace App\Http\Controllers;

use App\Models\Followers;
use App\Models\SocMed;
use App\Models\SubSocMed;
use Illuminate\Http\Request;

class FollowersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dataSocmed = SocMed::get(['id', 'name']);
        $dataSubSocmed = SubSocMed::get(['id', 'name', 'socmed_id']);
        $dataFollowers = Followers::with(['getSocmed', 'getSubSocmed'])->get();
        return view('followers.index', compact('dataFollowers', 'dataSocmed', 'dataSubSocmed'));
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
        $dataFollowers = Followers::create([
            'socmed_id' => $request->socmed_id,
            'sub_socmed_id' => $request->sub_socmed_id,
            'value' => $request->value
        ]);

        if ($dataFollowers) {
            return redirect()->route('followers')->with('success', 'Data Berhasil ditambah');
        }
        else{
            return redirect()->back()->with('error', 'data gagal diinput');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Followers  $followers
     * @return \Illuminate\Http\Response
     */
    public function show(Followers $followers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Followers  $followers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $dataSocmed = SocMed::get(['id', 'name']);
        $dataSubSocmed = SubSocMed::get(['id', 'name']);
        $dataFollowers = Followers::findOrFail($id);

        return view('followers.edit', compact('dataSocmed', 'dataSubSocmed', 'dataFollowers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Followers  $followers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $dataFollowers = Followers::findOrFail($id);
        $dataFollowers->update([
            'socmed_id' => $request->socmed_id,
            'subsocmed_id' => $request->subsocmed_id,
            'value' => $request->value
        ]);

        if ($dataFollowers) {
            return redirect()->route('followers')->with('success', 'data berhasil diupdate');
        }
        else {
            return redirect()->back()->with('error', 'data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Followers  $followers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $dataFollowers = Followers::findOrFail($id);
        $dataFollowers->delete();

        return redirect()->back()->with('status','Success Deleted');
    }
}

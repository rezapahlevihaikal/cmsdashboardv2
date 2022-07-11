<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AeEmployee;
use App\Models\Divisi;
use App\Models\CoreBisnis;

class AeEmployeeController extends Controller
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
        $dataDivisi = Divisi::get(['id', 'nama_divisi']);
        $dataCoreBisnis = CoreBisnis::get(['id', 'nama_core_bisnis', 'divisi']);
        $dataAeEmployee = AeEmployee::with(['getDivisi', 'getCoreBisnis'])->get();

        return view ('aeEmployee.index', compact('dataDivisi', 'dataCoreBisnis', 'dataAeEmployee'));
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
        $validator = AeEmployee::create([
            'name' => $request->name,
            'divisi_id' => $request->divisi_id,
            'core_bisnis_id' => $request->core_bisnis_id,
            'hiredate' => $request->hiredate
        ]);

        if($validator)
        {
            return redirect('aeEmployee')->with('success', 'Data Berhasil Diinput');
        }
        else
        {
            return redirect()->back()->with('error', 'Data Gagal Diinput');
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
        $dataDivisi = Divisi::get(['id', 'nama_divisi']);
        $dataCoreBisnis = CoreBisnis::get(['id', 'nama_core_bisnis', 'divisi']);
        $dataAeEmployee = AeEmployee::findOrFail($id);

        return view('aeEmployee.edit', compact('dataDivisi', 'dataCoreBisnis', 'dataAeEmployee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Req)uest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $dataAeEmployee = AeEmployee::findOrFail($id);
        $dataAeEmployee->update([
            'name' => $request->name,
            'divisi_id' => $request->divisi_id,
            'core_bisnis_id' => $request->core_bisnis_id,
            'hiredate' => $request->hiredate
        ]);

        if ($dataAeEmployee) {
            return redirect('aeEmployee')->with('success', 'Data Berhasil Diupdate');
        }
        else {
            return redirect()->route('aeEmployee.index')->with('error', 'Data Gagal Diupdate');
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
        $dataAeEmployee = AeEmployee::findOrFail($id);
        $dataAeEmployee->delete();

        return redirect()->back()->with('status', 'Data Berhasil Dihapus');
    }
}

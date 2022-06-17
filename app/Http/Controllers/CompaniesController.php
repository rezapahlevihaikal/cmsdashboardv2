<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Companies;

class CompaniesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dataCompanies = Companies::all();

        return view ('companies.index', compact('dataCompanies'));
    }
}

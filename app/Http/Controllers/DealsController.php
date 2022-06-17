<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deals;

class DealsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dataDeals = Deals::all();
        return view('deals.index', compact('dataDeals'));
    }
}

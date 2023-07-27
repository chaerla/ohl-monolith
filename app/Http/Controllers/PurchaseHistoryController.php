<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class PurchaseHistoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        return view('purchase-history');
    }
}

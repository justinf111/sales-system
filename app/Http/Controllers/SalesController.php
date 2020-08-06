<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class SalesController extends Controller
{
    public function index() {
        $sales = Sale::paginate(10);
        return view('sales', compact('sales'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class DashboardController extends Controller
{
    public function __invoke()
    {
        dd(Sale::where('date', '>', now()->subMonth()->toDateString())->groupBy('date')->get());
    }
}

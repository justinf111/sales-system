<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __invoke()
    {
        if(!request('start_date') && !request('end_date')) {
            $dailySales = Sale::where('date', '>', now()->subMonths(1)->toDateString());
        }
        else {
            $dailySales = Sale::where('date', '>', request('start_date'))->where('date', '<', request('end_date'));
        }
        $dailySales = $dailySales->with('products')->get()->sortBy('date')->groupBy(function($sale) {
            return $sale->date->format('Y-m-d');
        })->map(function($date) {
            return $date->sum(function($sale) {
                return $sale->total;
            });
        });

        $chartData = (Object)[
          'labels' => $dailySales->keys()->toArray(),
          'datasets' => [
              (Object)[
                  'label' => 'Daily Sales',
                  'backgroundColor' => '#f87979',
                  'data' => $dailySales->values()->map(function($total) {
                      return round($total, 2);
                  })->toArray()
              ]
          ]
        ];

        return view('dashboard', compact('chartData'));
    }
}

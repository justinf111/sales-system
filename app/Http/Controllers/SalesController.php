<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Employee;
use App\Models\Customer;

class SalesController extends Controller
{
    public function index() {
        $sales = Sale::query();
        if(request('employees') != null) {
            $sales = $sales->whereHas('employee', function($query) {
                $query->where('id', request('employees'));
            });
        }
        if(request('customers') != null) {
            $sales = $sales->whereHas('customer', function($query) {
                $query->where('id', request('customers'));
            });
        }
        $sales = $sales->paginate(10)->onEachSide(2);
        $customers = Customer::orderBy('full_name')->get(['id', 'full_name']);
        $employees = Employee::orderBy('name')->get(['id', 'name']);
        return view('sales', compact('sales', 'employees', 'customers'));
    }
}

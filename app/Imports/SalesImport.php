<?php
namespace App\Imports;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Employee;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Row;

class SalesImport implements OnEachRow, WithStartRow
{
    public function onRow(Row $row)
    {
        $row      = $row->toArray();
        $sale = Sale::create([
            'date' => Date::excelToDateTimeObject($row[2]),
            'customer_id' => Customer::where('full_name', $row[4])->first()->id,
            'employee_id' => Employee::where('name', $row[3])->first()->id,
        ]);

        $sale->products()->attach(Product::where('name', $row[1])->first()->id);
    }

    public function startRow(): int
    {
        return 2;
    }
}

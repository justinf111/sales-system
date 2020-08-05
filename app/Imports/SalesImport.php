<?php
namespace App\Imports;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class SalesImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        return Sale::create([
            'date' => Date::excelToDateTimeObject($row[2]),
            'product_id' => Product::where('name', $row[1])->first()->id,
            'customer_id' => Customer::where('full_name', $row[4])->first()->id,
            'employee_id' => Employee::where('name', $row[3])->first()->id,
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}

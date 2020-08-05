<?php
namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CustomerImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        return Customer::create([
            'first_name' => $row[1],
            'last_name' => $row[2],
            'full_name' => $row[3],
            'email' => $row[4],
            'gender' => $row[5],
            'street' => $row[6],
            'city' => $row[7],
        ]);

    }

    public function startRow(): int
    {
        return 2;
    }
}

<?php
namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class EmployeeImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        return Employee::firstOrCreate([
            'name' => $row[1]
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}

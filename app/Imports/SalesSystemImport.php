<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;

class SalesSystemImport implements WithMultipleSheets
{
    use WithConditionalSheets;

    public function conditionalSheets(): array
    {
        return [
            'customers' => new CustomerImport(),
            'products' => new ProductImport(),
            'employee' => new EmployeeImport(),
            'sales' => new SalesImport(),
        ];
    }

}

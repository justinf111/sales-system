<?php
namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProductImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        return Product::create([
            'name' => $row[1],
            'price' => $row[2],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}

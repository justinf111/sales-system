<?php

use Illuminate\Database\Seeder;
use App\Imports\SalesSystemImport;
use Maatwebsite\Excel\Facades\Excel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $import = new SalesSystemImport();
        $import->onlySheets('products', 'employee', 'customers');
        Excel::import($import, storage_path('app/TestData.xlsx'));

        $import = new SalesSystemImport();
        $import->onlySheets('sales');
        Excel::import($import, storage_path('app/TestData.xlsx'));
    }
}

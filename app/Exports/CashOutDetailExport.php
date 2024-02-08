<?php

namespace App\Exports;

use App\Models\CashOutDetail;
use Maatwebsite\Excel\Concerns\FromCollection;

class CashOutDetailExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CashOutDetail::all();
    }

    // public function headings(): array
    // {
    //     return [
    //         'Column1', // Replace with your actual column names
    //         'Column2',
    //         // Add more columns as needed
    //     ];
    // }
}

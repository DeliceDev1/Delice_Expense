<?php

namespace App\Exports;

use App\Models\CashOutDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CashOutDetailExport implements FromCollection, WithHeadings
{

    protected $branchId;

    public function __construct($branchId)
    {
        $this->branchId = $branchId;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return CashOutDetail::all();
        return CashOutDetail::where('branch_id', $this->branchId)->get();
    }

    public function headings(): array
    {
        return [
            'id',
            'category',
            'date',
            'amount',
            'purpose',
            'payment_mode',
            'pbn',
            'pbm',
            'tax',
            'agent',
            'image_path',
            // Add more columns as needed
        ];
    }
}

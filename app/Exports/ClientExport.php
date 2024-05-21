<?php

namespace App\Exports;

use App\Models\ClientDetail;
use App\Models\ClientFile;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ClientExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return ClientDetail::with('clientFiles')->get();
        // return ClientDetail::where('branch_id',$branch_id )->with('clientFiles')->get();
    }

    public function headings(): array
    {
        return [
            'id',
            'category',
            'date',
            'amount',
            'tax',
            'cpn',
            'cpm',
            'received',
            'agent',
            'currency',
            'image_path',
            // Add more columns as needed
        ];
    }
}

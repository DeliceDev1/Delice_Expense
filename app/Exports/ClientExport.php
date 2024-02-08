<?php

namespace App\Exports;

use App\Models\ClientDetail;
use App\Models\ClientFile;
use Maatwebsite\Excel\Concerns\FromCollection;

class ClientExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return ClientDetail::with('clientFiles')->get();
    }
}

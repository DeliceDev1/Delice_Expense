<?php

namespace App\Http\Controllers;

use App\Models\CashOutDetail;
use Illuminate\Http\Request;
use App\Models\User;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($id)
    {
        $users = User::get();
        $cashOutData = CashOutDetail::find($id);

        if (!$cashOutData) {
            // Handle the case where the record is not found, for example:
            return redirect()->route('display_out')->with('error', 'Record not found');
        }

        $data = [
            'title' => 'DELICE PLACEMENT INTERNATIONAL',
            'date' => date('m/d/Y'),
            'users' => $users,
            'cashOutData' => $cashOutData,
        ];

        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download('itsolutionstuff.pdf');
    }
}
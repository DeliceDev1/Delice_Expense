<?php

namespace App\Http\Controllers;

use App\Models\CashOutDetail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ClientDetail;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;

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


        $data = [
            'title' => 'DELICE PLACEMENT INTERNATIONAL',
            'date' => date('m/d/Y'),
            'users' => $users,
            'cashOutData' => $cashOutData,
        ];

        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download('cashOutInvoice.pdf');
    }

    public function getPdf($id)
    {

        $users = User::get();
        $clientDetail = ClientDetail::find($id);

        if (!$clientDetail) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);
        $html = view('cashInPdf', compact('clientDetail'))->render();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $pdfContent = $dompdf->output();

        return response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename=client_' . $id . '_pdf.pdf',
        ]);

    }


}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\User;
use Session;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;


class InvoiceController extends Controller
{
    public function showInvoiceForm($branch_id)
    {
        return view('invoice.invoice_infornation', compact('branch_id'));
    }

    public function store(Request $request, $branch_id)
    {
        // dd($request->all());
        // Define custom validation messages
        $customMessages = [

            'string' => 'The :attribute field must be a string.',
            'date' => 'The :attribute field must be a valid date.',
            'integer' => 'The :attribute field must be an integer.',
            'numeric' => 'The :attribute field must be a number.',
        ];

        // Validate the form data with custom messages
        $validatedData = $request->validate([

            'sender_name' => 'string',
            'sender_designation' => 'string',
            'sender_address' => 'string',
            'sender_country' => 'string',
            'sender_mobile' => 'string',

            'name' => 'string',
            'company' => 'string',
            'mobile' => 'string',
            'address' => 'string',
            'country' => 'string',

            'partner_code' => 'string',
            'date' => 'date',
            'invoice_type' => 'string',

            'activity_name' => 'string',
            'quantity' => 'integer',
            'rate' => 'numeric',
            'amount' => 'numeric',

            'account_name' => 'string',
            'account_no' => 'string',
            'bank_name' => 'string',
            'transaction_date' => 'date',
            'reference_code' => 'string',
            'initiator' => 'string',
            'subtotal' => 'numeric',
            'vat' => 'numeric',
            'total' => 'numeric',

        ], $customMessages);

        $validatedData['branch_id'] = $branch_id;

        // Create a new invoice record using Eloquent
        $invoice = Invoice::create($validatedData);
        Session::flash('msg', 'Invoice Created Successfuly');
        // Redirect the user back or wherever appropriate
        return redirect()->back();
    }

    public function showInvoiceList($branch_id)
    {
        // $invoiceData = Invoice::all();

        $invoiceData = Invoice::where('branch_id', $branch_id)->get();
        return view('invoice.invoice_list', compact('invoiceData'));
    }

    public function deleteInvoiceItem($id, $branch_id)
    {
        $findItem = Invoice::where('branch_id',$branch_id)->find($id);
        $findItem->delete();
        Session::flash('msg', 'Invoice deleted Successfuly');
        return redirect()->back();
    }

    public function editInvoiceItem($id, $branch_id)
    {
        $findItem = Invoice::where('branch_id',$branch_id)->find($id);
        // dd($findItem);
        return view('invoice.edit_invoice', compact('findItem'));
    }

    public function updateInvoiceItem($id, Request $request, $branch_id)
    {
        $itemToBeUpdated = Invoice::where('branch_id',$branch_id)->find($id);

        $customMessages = [

            'string' => 'The :attribute field must be a string.',
            'date' => 'The :attribute field must be a valid date.',
            'integer' => 'The :attribute field must be an integer.',
            'numeric' => 'The :attribute field must be a number.',
        ];

        // Validate the form data with custom messages
        $validatedData = $request->validate([
          
            'sender_name' => 'string',
            'sender_designation' => 'string',
            'sender_address' => 'string',
            'sender_country' => 'string',
            'sender_mobile' => 'string',

            'name' => 'string',
            'company' => 'string',
            'mobile' => 'string',
            'address' => 'string',
            'country' => 'string',

            'partner_code' => 'string',
            'date' => 'date',
            'invoice_type' => 'string',

            'activity_name' => 'string',
            'quantity' => 'integer',
            'rate' => 'numeric',
            'amount' => 'numeric',

            'account_name' => 'string',
            'account_no' => 'string',
            'bank_name' => 'string',
            'transaction_date' => 'date',
            'reference_code' => 'string',
            'initiator' => 'string',
            'subtotal' => 'numeric',
            'vat' => 'numeric',
            'total' => 'numeric',
        ], $customMessages);

        $validatedData['branch_id'] = $branch_id;


        $itemToBeUpdated->update($validatedData);

        return redirect()->back()->with('msg', 'invoice updated successfully');


    }

    public function generateInvoice($id)
    {
        $users = User::get();
        $invoiceData = Invoice::find($id);


        $data = [
            'title' => 'DELICE PLACEMENT INTERNATIONAL',
            'date' => date('m/d/Y'),
            'users' => $users,
            'invoiceData' => $invoiceData,
        ];

        $pdf = PDF::loadView('invoice.invoicePdf', $data);

        return $pdf->download('Delice-Invoice.pdf');
    }


}

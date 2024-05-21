<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'branch_id',
        'sender_name',
        'sender_designation',
        'sender_address',
        'sender_country',
        'sender_mobile',
        'name',
        'company',
        'mobile',
        'address',
        'country',
        'partner_code',
        'date',
        'invoice_type',
        'activity_name',
        'quantity',
        'rate',
        'amount',
        'account_name',
        'account_no',
        'bank_name',
        'transaction_date',
        'reference_code',
        'initiator',
        'subtotal',
        'vat',
        'total',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashOutDetail extends Model
{
    use HasFactory;

    protected $fillable = [
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
    ];

    public function getImagePathAttribute($value)
    {
        return asset('images/' . $value);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddCashOutCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category', 'branch_id'];
}

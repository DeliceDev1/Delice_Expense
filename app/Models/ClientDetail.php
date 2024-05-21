<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'category',
        'date',
        'amount',
        'tax',
        'cpn',
        'cpm',
        'received',
        'agent',
        'currency',
        'branch_id',
        'image_path',
    ];

    // Assuming the table name is 'client_details'
    protected $table = 'client_details';

    public function clientFiles()
    {
        return $this->hasMany(ClientFile::class);
    }
}

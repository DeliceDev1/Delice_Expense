<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientFile extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'passport', 'nationality', 'appliedCountry'];

    protected $table = 'client_files';

    public function clientDetail()
    {
        return $this->belongsTo(ClientDetail::class);
    }
}

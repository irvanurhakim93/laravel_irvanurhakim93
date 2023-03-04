<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rumahsakit extends Model
{
    use HasFactory;

    protected $table = 'rumahsakit';

    protected $fillable = 
    [
        'nama_rumah_sakit',
        'alamat',
        'email',
        'telepon',
        'created_at',
        'updated_at'
    ];
}

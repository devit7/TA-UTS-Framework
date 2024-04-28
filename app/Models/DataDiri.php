<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDiri extends Model
{
    use HasFactory;
// membuat id menjadi tidak bisa diisi secara manual
    protected $guarded = [
        'id'
    ];
    // merubah route key dari id ke nim
    public function getRouteKeyName()
    {
        return 'nim';
    }
}

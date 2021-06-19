<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suratkeluar extends Model
{
    use HasFactory;

    protected $table = 'suratkeluar';
    protected $primaryKey = 'id_suratkeluar';
    protected $fillable = [
        'nomorberkas','alamatpenerima','tanggalkeluar','perihal','nomorpetunjuk','aksi'
    ];
}

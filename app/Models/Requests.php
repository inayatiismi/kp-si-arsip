<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;
    protected $table = 'requests';
    protected $primaryKey = 'id_requests';
    protected $fillble = [
        'nomorberkas','jenissurat','alamatsurat','tanggalsurat','perihal','nomorpetunjuk','status','keterangan'
    ];

    public function suratMasuk()
    {
        return $this->hasOne(Suratmasuk::class, 'id_suratmasuk', 'id_suratmasuk');
    }
}

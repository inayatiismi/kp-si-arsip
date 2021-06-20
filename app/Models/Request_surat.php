<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request_surat extends Model
{
    use HasFactory;

    public $fillable = ['jenis_surat_id', 'surat_masuk_id', 'surat_keluar_id', 'status_id'];
    public $table = 'requests';

    public function jenisSurat()
    {
        return $this->hasOne(Jenis_surat::class, 'id', 'jenis_surat_id');
    }

    public function suratMasuk()
    {
        return $this->hasOne(Surat_masuk::class, 'id', 'surat_masuk_id');
    }

    public function suratKeluar()
    {
        return $this->hasOne(Surat_keluar::class, 'id', 'surat_keluar_id');
    }

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

}

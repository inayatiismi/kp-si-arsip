<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    public $fillable = ['jenis_surat_id', 'surat_masuk_id'];

    public function jenisSurat()
    {
        return $this->hasOne(Jenis_surat::class, 'id', 'jenis_surat_id');
    }

    public function suratMasuk()
    {
        return $this->hasMany(Surat_masuk::class, 'id', 'surat_masuk_id');
    }

}

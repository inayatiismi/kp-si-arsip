<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Suratmasuk extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    protected $table = 'suratmasuk';
    protected $primaryKey = 'id_suratmasuk';
    protected $fillable = [
        'nomorberkas', 'alamatpengirim', 'tanggalmasuk', 'perihal', 'nomorpetunjuk', 'aksi'
    ];
}

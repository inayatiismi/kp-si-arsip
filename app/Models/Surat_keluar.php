<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Surat_keluar extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    
    public $table = 'surat_keluar';

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

    public function request()
    {
        return $this->belongsTo(Request_surat::class, 'id', 'surat_keluar_id');
    }
}

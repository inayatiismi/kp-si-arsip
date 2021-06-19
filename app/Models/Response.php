<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $table = 'request';
    protected $primaryKey = 'id_response';
    protected $fillble = [
        'nomorberkas','jenissurat','alamasurat','tanggalsurat','perihal','nomorpetunjuk','keterangan','aksi'
    ];
}

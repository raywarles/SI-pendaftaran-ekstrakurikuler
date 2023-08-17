<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;
    protected $fillable = ['anggota_id','ekstrakurikuler_id','nilai','semester_id','status_pendaftaran','alasan'];
}

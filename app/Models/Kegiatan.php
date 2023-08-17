<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $dates = ['created_at','tanggal','jam'];
    protected $fillable = ['ekstrakurikuler_id','nama_kegiatan','keterangan','jam','tanggal','semester_id'];
}

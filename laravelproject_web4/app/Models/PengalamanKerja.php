<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengalamanKerja extends Model
{
    use HasFactory;
    protected $table = 'pengalaman_kerja';
    protected $fillable = ['nama_perusahaan', 'posisi', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai'];
}

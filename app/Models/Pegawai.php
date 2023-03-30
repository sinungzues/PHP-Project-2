<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = ['nip_pegawai','nip_pejabat','nama_pegawai','jabatan','golongan_darah','nama_kantor','kode_cetak','foto'];
}

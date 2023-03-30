<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pejabat extends Model
{
    use HasFactory;

    protected $fillable = ['nip_pejabat','nama_pejabat','ttd','cap','jabatan_pejabat'];
}

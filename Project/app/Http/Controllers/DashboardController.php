<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->cari;

        $pegawai = DB::table('pegawais')->where('nip_pegawai','like','%'.$cari.'%')
                ->orWhere('nama_pegawai','like','%'.$cari.'%')
                ->paginate(10);

        return view('index',["pegawais" => $pegawai
                ]);
    }
}
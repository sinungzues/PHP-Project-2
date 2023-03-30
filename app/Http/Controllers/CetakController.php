<?php

namespace App\Http\Controllers;

use App\Models\Cetak;
use App\Models\Pegawai;
use App\Models\Kantor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CetakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;
        $pegawai = DB::table('pegawais')->where('nip_pegawai','like','%'.$cari.'%')
                ->orWhere('nama_pegawai','like','%'.$cari.'%')
                ->paginate(10);
        return view('cetak.cetak',[
            "pegawai" => $pegawai
        ]);
    }

    public function cetak()
    {
        $kode = random_int(10000,99999);
        Cetak::insert([
            'kode_cetak' => $kode,
            'tgl_print' => (date('d M Y'))
        ]);
        
        $join = Pegawai::leftJoin('pejabats','pegawais.nip_pejabat','=','pejabats.nip_pejabat')
                        ->leftJoin('kantors','pegawais.nama_kantor','=','kantors.nama_kantor');
        
        $join = $join->get();

        $print = Cetak::orderBy('id','DESC')->take(1)->get();

        $view = view('cetak.cetak_kartu',['join'=>$join, 'print'=>$print]);

        return $view;
    }

    public function cetakByNip(Request $request)
    {
        $kode = random_int(10000,99999);
        
        Cetak::insert([
            'kode_cetak' => $kode,
            'tgl_print' => (date('d M Y'))
        ]);
        
        $join = Pegawai::leftJoin('pejabats','pegawais.nip_pejabat','=','pejabats.nip_pejabat')
                        ->leftJoin('kantors','pegawais.nama_kantor','=','kantors.nama_kantor')
                        ->where('nip_pegawai',$request->nip_pegawai);
        
        $join = $join->get();
        $print = Cetak::orderBy('id','DESC')->take(1)->get();

        $view = view('cetak.cetak_kartu',['join'=>$join,'print'=>$print]);

        return $view;
    }

    public function cetakKode()
    {
        return view('cetak.cetakByKode',[
            "pegawai" => Pegawai::paginate(20)
        ]);
    }
    public function cetakByKode($kode_cetak)
    {
        Cetak::insert([
            'kode_cetak' => $kode_cetak,
            'tgl_print' => (date('d M Y'))
        ]);
        
        $join = Pegawai::leftJoin('pejabats','pegawais.nip_pejabat','=','pejabats.nip_pejabat')
                        ->leftJoin('kantors','pegawais.nama_kantor','=','kantors.nama_kantor')
                        ->where('kode_cetak',$kode_cetak)
                        ->get();
        
        $print = Cetak::orderBy('id','DESC')->take(1)->get();
        
        $view = view('cetak.cetak_kartu',compact('join','print'));

        return $view;
    }

    public function cetakNamaKantor()
    {
        return view('cetak.cetakByKantor',[
            "pegawai" => Pegawai::paginate(20),
            "kantor" => Kantor::all()
        ]);
    }

    public function cetakByKantor($nama_kantor)
    {
        Cetak::insert([
            'nama_kantor' => $nama_kantor,
            'tgl_print' => (date('d M Y'))
        ]);
        
        $join = Pegawai::leftJoin('pejabats','pegawais.nip_pejabat','=','pejabats.nip_pejabat')
                        ->leftJoin('kantors','pegawais.nama_kantor','=','kantors.nama_kantor')
                        ->where('pegawais.nama_kantor',$nama_kantor)
                        ->get();
        
        $print = Cetak::orderBy('id','DESC')->take(1)->get();
        
        $view = view('cetak.cetak_kartu',compact('join','print'));

        return $view;
    }
}

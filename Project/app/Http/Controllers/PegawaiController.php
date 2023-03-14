<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Kantor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Testing\File;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::paginate(10);
        return view('index',[
            "pegawais" => $pegawai
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kantor = DB::table('kantors')->get();
        return view('pegawai.tambah',['kantors' => $kantor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepegawaiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nip_pegawai' => 'required|max:18|unique:pegawais',
            'nama_pegawai' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'golongan_darah' => 'required|max:10',
            'nama_kantor' => 'required|max:255',
            'kode_cetak' => 'required',
            'foto' => 'image|file'
        ]);

        if($request->file('foto')){
            $validateData['foto'] = $request->file('foto')->store('/image');
        }

        Pegawai::create($validateData);

        return redirect('/')->with('success', 'Data telah ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($nip)
    {
        $pegawai = Pegawai::where('nip_pegawai', $nip)->get();
        return view('pegawai.edit',['pegawais' => $pegawai], ['kantors' => Kantor::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepegawaiRequest  $request
     * @param  \App\Models\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validateData = $request->validate([
            'nip_pegawai' => 'required',
            'nama_pegawai' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'golongan_darah' => 'required|max:10',
            'nama_kantor' => 'required|max:255',
            'kode_cetak' => 'required',
            'foto' => 'image|file'
        ]);

        if($request->file('foto')){
            if($request->fotoLama){
                Storage::delete($request->fotoLama);
            }
            $validateData['foto'] = $request->file('foto')->store('image');
        }
        
        Pegawai::where('nip_pegawai',$request->nip_pegawai)->update(
            $validateData);
        
        return redirect('/')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if($request->foto){
            Storage::delete($request->foto);
            File::delete('storage/'.$request->foto);
        }
        DB::table('pegawais')->where('nip_pegawai', $request->nip_pegawai)->delete();
        
        return redirect('/')->with('delete', ' Data Berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pejabat;
use App\Models\Pegawai;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PejabatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;

        $pejabat = DB::table('pejabats')->where('nip_pejabat','like','%'.$cari.'%')
                ->orWhere('nama_pejabat','like','%'.$cari.'%')
                ->paginate(10);

        return view('pejabat.index',["pejabats" => $pejabat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = Pegawai::all();
        return view('pejabat.tambah_pejabat',['pegawais'=>$pegawai]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePejabatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nip_pejabat' => 'required|max:18',
            'nama_pejabat' => 'required|max:255',
            'ttd' => 'image|file|mimes:png',
            'cap' => 'image|file|mimes:png',
            'jabatan_pejabat' => 'required|max:255'
        ]);

        $nipPejabat = $request->validate([
            'nip_pejabat' => 'required'
        ]);

        if($request->file('ttd')){
            $validateData['ttd'] = $request->file('ttd')->store('ttd');
        }
        if($request->file('cap')){
            $validateData['cap'] = $request->file('cap')->store('cap');
        }

        Pejabat::create($validateData);
        Pegawai::whereNotNull('nip_pejabat')->orWhereNull('nip_pejabat')
                ->update($nipPejabat);

        return redirect('/pejabat')->with('success', 'Data telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pejabat  $pejabat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pejabat.refresh',['pejabats' => Pejabat::where('nip_pejabat', $id)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pejabat  $pejabat
     * @return \Illuminate\Http\Response
     */
    public function edit(Pejabat $pejabat)
    {
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePejabatRequest  $request
     * @param  \App\Models\Pejabat  $pejabat
     * @return \Illuminate\Http\Response
     */
    public function update(REQUEST $request)
    {
        $validateData = $request->validate([
            'nip_pejabat' => 'required|max:18',
            'nama_pejabat' => 'required|max:255',
            'ttd' => 'image|file|mimes:png',
            'cap' => 'image|file|mimes:png',
            'jabatan_pejabat' => 'required|max:255'
        ]);
    
        $nipPejabat = $request->validate([
            'nip_pejabat' => 'required'
        ]);
    
        if($request->file('ttd')){
            if($request->ttdLama){
                Storage::delete($request->ttdLama);
            }
            $validateData['ttd'] = $request->file('ttd')->store('ttd');
        }
        if($request->file('cap')){
            if($request->capLama){
                Storage::delete($request->capLama);
            }
            $validateData['cap'] = $request->file('cap')->store('cap');
        }
    
        Pejabat::where('nip_pejabat', $request->nip_pejabat)->update($validateData);
        Pegawai::whereNotNull('nip_pejabat')->update($nipPejabat);
    
        return redirect('/pejabat')->with('success','Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pejabat  $pejabat
     * @return \Illuminate\Http\Response
     */
    public function destroy(REQUEST $request)
    {
        if($request->ttd){
            Storage::delete($request->ttd);
        }
        if($request->cap){
            Storage::delete($request->cap);
        }

        Pejabat::where('nip_pejabat', $request->nip_pejabat)->delete();
        
        return redirect('/pejabat')->with('delete', ' Data Berhasil dihapus');
    }
}

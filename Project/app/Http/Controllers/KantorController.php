<?php
namespace App\Http\Controllers;

use App\Models\Kantor;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KantorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;

        $kantor = DB::table('kantors')->where('nama_kantor','like','%'.$cari.'%')
                ->orWhere('alamat_kantor','like','%'.$cari.'%')
                ->paginate(10);

        return view('kantor.kantor',["kantors" => $kantor
                ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kantor.tambah_kantor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKantorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kantor::insert([
            'nama_kantor' => $request->nama_kantor,
            'alamat_kantor' => $request->alamat_kantor]);

        return redirect('/kantor')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kantor  $kantor
     * @return \Illuminate\Http\Response
     */
    public function show(Kantor $kantor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kantor  $kantor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('kantor.edit_kantor',['kantors' => Kantor::where('id', $id)->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKantorRequest  $request
     * @param  \App\Models\Kantor  $kantor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Kantor::where('id',$request->id)->update([
            'id' => $request->id,
            'nama_kantor' => $request->nama_kantor,
            'alamat_kantor' => $request->alamat_kantor
        ]);
        

        return redirect('/kantor')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kantor  $kantor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kantor::where('id',$id)->delete();

        return redirect('/kantor')->with('delete', 'Data berhasil dihapus');
    }
}

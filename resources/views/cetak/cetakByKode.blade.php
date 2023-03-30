@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cetak ID Card</h1>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="input-group mb-3">
                <label for="kode_cetak"></label>
                <input type="text" class="form-control" id="kode_cetak" placeholder="Kode Cetak" name="kode_cetak">
                <a href="" onclick="this.href='/cetak/kode_cetak/'+document.getElementById('kode_cetak').value"
                    target="_blank"><button class="btn btn-primary" type="submit"><i class="fas fa-print"></i>
                        Cetak</button></a>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Kode Cetak</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pegawai as $p)
                <tr>
                    <td>{{ $p->kode_cetak }}</td>
                    <td>{{ $p->nip_pegawai }}</td>
                    <td>{{ $p->nama_pegawai }}</td>
                    <td><img src="{{ asset('storage/' . $p->foto) }}" alt="{{ $p->nama_pegawai }}" width="40"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pegawai->links() }}
@endsection

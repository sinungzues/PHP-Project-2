@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cetak ID Card</h1>
    </div>
    <div class="row">
        <div class="col-md-5">
            <form action="/cetak" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari" name="cari">
                    <button class="btn btn-danger" type="submit"><i class="fas fa-search"></i> Cari</button>
                </div>
            </form>
        </div>
    </div>
    <a href="cetak/cetak_kartu" target="_blank" class="btn btn-primary mt-3">Cetak </a>
    <table class="table">
        <thead>
            <tr>
                <th>Kode Cetak</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Kantor</th>
                <th>Foto</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pegawai as $p)
                <tr>
                    <td>{{ $p->kode_cetak }}</td>
                    <td>{{ $p->nip_pegawai }}</td>
                    <td>{{ $p->nama_pegawai }}</td>
                    <td>{{ $p->nama_kantor }}</td>
                    <td><img src="{{ asset('storage/' . $p->foto) }}" alt="{{ $p->nama_pegawai }}" width="40"></td>
                    <td><a href="cetak/cetak_kartu/{{ $p->nip_pegawai }}" target="_blank"><button
                                class="btn-primary"><i class="fas fa-print"></i></button></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pegawai->links() }}
@endsection

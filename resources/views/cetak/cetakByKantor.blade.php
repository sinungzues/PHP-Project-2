@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cetak ID Card</h1>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="input-group mb-3">
                <label for="nama_kantor"></label>
                <select name="nama_kantor" id="nama_kantor" class="form-select" required>
                    @foreach ($kantor as $k)
                        <option value="{{ $k->nama_kantor }}" selected>{{ $k->nama_kantor }}</option>
                    @endforeach
                </select>
                <a href="" onclick="this.href='/cetak/nama_kantor/'+document.getElementById('nama_kantor').value"
                    target="_blank"><button class="btn btn-primary" type="submit"><i class="fas fa-print"></i>
                        Cetak</button></a>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Kantor</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pegawai as $p)
                <tr>
                    <td>{{ $p->nip_pegawai }}</td>
                    <td>{{ $p->nama_pegawai }}</td>
                    <td>{{ $p->nama_kantor }}</td>
                    <td><img src="{{ asset('storage/' . $p->foto) }}" alt="{{ $p->nama_pegawai }}" width="40"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pegawai->links() }}
@endsection

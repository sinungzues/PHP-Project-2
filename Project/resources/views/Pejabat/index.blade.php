@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Pejabat</h1>
        <a href="/pejabat/tambah"><button class="btn-primary"><i class="fas fa-plus"></i> Tambah Data</button></a>
    </div>
    <div class="row">
        <div class="col-md-5">
            <form action="/pejabat" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari" name="cari">
                    <button class="btn btn-danger" type="submit"><i class="fas fa-search"></i> Cari</button>
                </div>
            </form>
        </div>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('delete'))
        <div class="alert alert-danger" role="alert">
            {{ session('delete') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIP</th>
                <th>Tanda Tangan</th>
                <th>Cap</th>
                <th>Jabatan</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pejabats as $p)
                <tr>
                    <td>{{ $p->nama_pejabat }}</td>
                    <td>{{ $p->nip_pejabat }}</td>
                    <td><img src="{{ asset('storage/' . $p->ttd) }}" alt="{{ $p->nama_pejabat }}" width="50"></td>
                    <td><img src="{{ asset('storage/' . $p->cap) }}" alt="{{ $p->nama_pejabat }}" width="50"></td>
                    <td>{{ $p->jabatan_pejabat }}</td>
                    <td><a href="/pejabat/edit/{{ $p->nip_pejabat }}"><button class="btn-warning"><i
                                    class="fas fa-edit"></i></button></a>
                        <a href="/pejabat/hapus/{{ $p->nip_pejabat }}"><button class="btn-danger"><i
                                    class="fas fa-trash"></i></button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pejabats->links() }}
@endsection

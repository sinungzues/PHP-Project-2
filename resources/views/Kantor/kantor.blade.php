@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Kantor</h1>
        <a href="/kantor/tambah"><button class="btn-primary"><i class="fas fa-plus"></i> Tambah Data</button></a>
    </div>
    <div class="row">
        <div class="col-md-5">
            <form action="/kantor" method="GET">
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
            <tr class="text-center">
                <th>No</th>
                <th>Nama Kantor</th>
                <th>Alamat Kantor</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($kantors as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->nama_kantor }}</td>
                    <td>{{ $k->alamat_kantor }}</td>
                    <td>
                        <a href="/kantor/edit/{{ $k->id }}"><button class="btn-warning"><i
                                    class="fas fa-edit"></i></button></a>
                        <a href="/kantor/hapus/{{ $k->id }}"
                            onclick="return confirm('Apakah anda ingin menghapus data?')"><button class="btn-danger"><i
                                    class="fas fa-trash"></i></button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $kantors->links() }}
@endsection

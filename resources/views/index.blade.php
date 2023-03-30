@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Pegawai</h1>
        <a href="/pegawai/tambah"><button class="btn-primary"><i class="fas fa-plus"></i> Tambah Data</button></a>
    </div>

    <div class="row">
        <div class="col-md-5">
            <form action="/" method="GET">
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
    <div class="table-responsive">
        <table class="table table-sm">
            <thead class="text-center">
                <tr>
                    <th scope="col">NIP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Gol. Darah</th>
                    <th scope="col">Kantor</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($pegawais as $p)
                    <tr>
                        <td>{{ $p->nip_pegawai }}</td>
                        <td>{{ $p->nama_pegawai }}</td>
                        <td>{{ $p->jabatan }}</td>
                        <td>{{ $p->golongan_darah }}</td>
                        <td>{{ $p->nama_kantor }}</td>
                        <td><img src="{{ asset('storage/' . $p->foto) }}" alt="{{ $p->nama_pegawai }}" width="40"
                                height="60"></td>
                        <td>
                            <a href="/pegawai/edit/{{ $p->nip_pegawai }}"><button class="btn-warning"><i
                                        class="fas fa-edit"></i></button></a>
                            <a href="/pegawai/hapus/{{ $p->nip_pegawai }}"
                                onclick="return confirm('Apakah anda ingin menghapus data?')"><button
                                    class="btn-danger"><i class="fas fa-trash"></i></button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $pegawais->links() }}
@endsection

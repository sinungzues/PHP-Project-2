@extends('layouts.main')

@section('container')
    <h1 class="text-center">Ubah Data</h1>
    <a href="/kantor"><button class="btn-danger mb-3">Batal</button></a>
    @foreach ($kantors as $k)
        <form action="/kantor/update" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $k->id }}">
            <div class="mb-3">
                <label for="nama_kantor" class="form-label">Nama Kantor</label>
                <input type="text" name="nama_kantor" id="nama_kantor" class="form-control" required
                    value="{{ $k->nama_kantor }}">
            </div>
            <div class="mb-3">
                <label for="alamat_kantor" class="form-label">Alamat Kantor</label>
                <input type="text" name="alamat_kantor" id="alamat_kantor" class="form-control" required
                    value="{{ $k->alamat_kantor }}">
            </div>

            <button class="btn-success" name="submit">Ubah</button>
        </form>
    @endforeach
@endsection

@extends('layouts.main')

@section('container')
    <h1 class="text-center">TAMBAH DATA</h1>
    <a href="/kantor"><button class="btn-danger mb-3">Batal</button></a>

    <form action="/kantor/store" method="post">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Kantor</label>
            <input type="text" name="nama_kantor" id="nama" class="form-control" required
                value="{{ old('nama_kantor') }}">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Kantor</label>
            <input type="text" name="alamat_kantor" id="alamat" class="form-control" required
                value="{{ old('alamat_kantor') }}">
        </div>

        <button class="btn-success" name="submit">Submit</button>
    </form>
@endsection

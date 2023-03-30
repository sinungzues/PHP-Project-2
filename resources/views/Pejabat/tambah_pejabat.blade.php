@extends('layouts.main')

@section('container')
    <h1>Input Data</h1>
    <a href="/pejabat"><button class="btn-danger">Batal</button></a>
    <form action="/pejabat/store" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nip_pejabat" class="form-label">NIP</label>
            <input type="text" name="nip_pejabat" id="nip_pejabat"
                class="form-control @error('nip_pejabat') is-invalid @enderror" maxlength="18"
                value="{{ old('nip_pejabat') }}">
            @error('nip_pejabat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama_pejabat" class="form-label">Nama</label>
            <input type="text" name="nama_pejabat" id="nama_pejabat"
                class="form-control @error('nama_pejabat') is-invalid @enderror" value="{{ old('nama_pejabat') }}">
            @error('nama_pejabat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="ttd" class="form-label">Tanda Tangan (<i>Scan .png</i>)</label>
            <img class="img-preview1 img-fluid mb-3" width="75px">
            <input type="file" name="ttd" id="ttd" class="form-control @error('ttd') is-invalid @enderror"
                onchange="previewTtd()">
            @error('ttd')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="cap" class="form-label">Cap (<i>Scan .png</i>)</label>
            <img class="img-preview2 img-fluid mb-3" width="75px">
            <input type="file" name="cap" id="cap" class="form-control @error('cap') is-invalid @enderror"
                onchange="previewCap()">
            @error('cap')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jabatan_pejabat" class="form-label">Jabatan</label>
            <input type="text" name="jabatan_pejabat" id="jabatan_pejabat"
                class="form-control @error('jabatan_pejabat') is-invalid @enderror" value="{{ old('jabatan_pejabat') }}">
            @error('jabatan_pejabat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button class="btn-success" name="submit">Tambah</button>
    </form>
@endsection

@extends('layouts.main')

@section('container')
    <h1 class="text-center">INPUT DATA</h1>
    <a href="/"><button class="btn-danger mb-3">Batal</button></a>
    <form action="/pegawai/store" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nip_pegawai" class="form-label">NIP</label>
            <input type="text" name="nip_pegawai" id="nip_pegawai" class="form-control @error('nip') is-invalid @enderror"
                maxlength="18" required value="{{ old('nip_pegawai') }}" autofocus>
            @error('nip')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama_pegawai" class="form-label">Nama</label>
            <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" required
                value="{{ old('nama_pegawai') }}">
        </div>
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" class="form-control" required value="{{ old('jabatan') }}">
        </div>
        <div class="mb-3">
            <label for="godlar" class="form-label">Golongan Darah</label>
            <select name="golongan_darah" id="goldar" class="form-select" required>
                <option value="-">--Pilih--</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="AB">AB</option>
                <option value="O">O</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="nama_kantor" class="form-label">Alamat Kantor</label>
            <select name="nama_kantor" id="nama_kantor" class="form-select" required>
                <option value="-">--Pilih--</option>
                @foreach ($kantors as $k)
                    @if (old('nama_kantor') == $k->nama_kantor)
                        <option value="{{ $k->nama_kantor }}" selected>{{ $k->nama_kantor }}</option>
                    @else
                        <option value="{{ $k->nama_kantor }}">{{ $k->nama_kantor }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="kode_cetak" class="form-label">Kode Cetak</label>
            <input type="text" name="kode_cetak" id="kode_cetak" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <img class="img-preview img-fluid mb-3" width="75px">
            <input type="file" name="foto" id="foto" class="form-control" onchange="previewFoto()">
        </div>

        <button class="btn-success" type="submit" name="submit">Submit</button>
    </form>
@endsection

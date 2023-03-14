@extends('layouts.main')

@section('container')
    <h1 class="text-center">EDIT DATA</h1>
    <a href="/"><button class="btn-danger mb-3">Batal</button></a>
    @foreach ($pegawais as $p)
        <form action="/pegawai/update" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nip_pegawai" class="form-label">NIP</label>
                <input type="text" name="nip_pegawai" id="nip_pegawai" class="form-control" required
                    value="{{ old('nip_pegawai', $p->nip_pegawai) }}" maxlength="18">
            </div>
            <div class="mb-3">
                <label for="nama_pegawai" class="form-label">Nama</label>
                <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" required
                    value="{{ old('nip', $p->nama_pegawai) }}">
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" name="jabatan" id="jabatan" class="form-control" required
                    value="{{ old('nip', $p->jabatan) }}">
            </div>
            <div class="mb-3">
                <label for="godlar" class="form-label">Golongan Darah</label>
                <select name="golongan_darah" id="goldar" class="form-select" required>
                    <option selected>--Pilih--</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nama_kantor" class="form-label">Nama Kantor</label>
                <select name="nama_kantor" id="nama_kantor" class="form-select">
                    <option selected>--Pilih--</option>
                    @foreach ($kantors as $k)
                        @if (old('nama_kantor', $k->nama_kantor) == $k->nama_kantor)
                            <option value="{{ $k->nama_kantor }}" selected>{{ $k->nama_kantor }}</option>
                        @else
                            <option value="{{ $k->nama_kantor }}">{{ $k->nama_kantor }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="kode_cetak" class="form-label">Kode Cetak</label>
                <input type="text" name="kode_cetak" id="kode_cetak" class="form-control" required
                    value="{{ $p->kode_cetak }}">
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="hidden" name="fotoLama" value="{{ $p->foto }}">
                @if ($p->foto)
                    <img class="img-preview img-fluid mb-3 d-block" src="{{ asset('storage/' . $p->foto) }}"
                        alt="{{ $p->nama_pegawai }}" width="75px">
                @else
                    <img class="img-preview img-fluid mb-3" width="75px">
                @endif
                <input type="file" name="foto" id="foto" class="form-control" onchange="previewFoto()">
            </div>

            <button class="btn-success" name="submit">Submit</button>
        </form>
    @endforeach
@endsection

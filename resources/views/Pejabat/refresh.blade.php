@extends('layouts.main')

@section('container')
    <h1 class="text-center">Ubah Data</h1>
    <a href="/pejabat"><button class="btn-danger mb-3">Batal</button></a>
    <form action="/pejabat/update" method="post" enctype="multipart/form-data">
        @csrf
        @foreach ($pejabats as $p)
            <div class="mb-3">
                <label for="nama_pejabat" class="form-label">Nama</label>
                <input type="text" name="nama_pejabat" id="nama_pejabat"
                    class="form-control @error('nama_pejabat') is-invalid @enderror" value="{{ $p->nama_pejabat }}">
                @error('nama_pejabat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nip_pejabat" class="form-label">NIP</label>
                <input type="text" name="nip_pejabat" id="nip_pejabat"
                    class="form-control @error('nip_pejabat') is-invalid @enderror" value="{{ $p->nip_pejabat }}">
                @error('nip_pejabat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ttd" class="form-label">TTD (<i>Scan .png</i>)</label>
                <input type="hidden" name="ttdLama" value="{{ $p->ttd }}">
                @if ($p->cap)
                    <img class="img-preview img-fluid mb-3 d-block" width="75px" src="{{ asset('storage/' . $p->ttd) }}">
                @else
                    <img class="img-preview img-fluid mb-3" width="75px">
                @endif
                <input type="file" name="ttd" id="ttd" class="form-control @error('ttd') is-invalid @enderror">
                @error('ttd')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cap" class="form-label">Cap (<i>Scan .png</i>)</label>
                <input type="hidden" name="capLama" value="{{ $p->cap }}">
                @if ($p->cap)
                    <img class="img-preview img-fluid mb-3 d-block" width="75px" src="{{ asset('storage/' . $p->cap) }}">
                @else
                    <img class="img-preview img-fluid mb-3" width="75px">
                @endif
                <input type="file" name="cap" id="cap" class="form-control @error('cap') is-invalid @enderror">
                @error('cap')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jabatan_pejabat" class="form-label">Jabatan</label>
                <input type="text" name="jabatan_pejabat" id="jabatan_pejabat"
                    class="form-control @error('jabatan_pejabat') is-invalid @enderror"
                    value="{{ $p->jabatan_pejabat }}">
                @error('jabatan_pejabat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        @endforeach
        <button class="btn-primary">Update</button>
    </form>
@endsection

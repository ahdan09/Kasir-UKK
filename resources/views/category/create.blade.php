@extends('layout.master')

@section('content')
    @if (Auth::user()->role === 'admin')
        <div class="container-fluid">
            <div class="card bg-white">
                <div class="card-body">
                    <h5 class="card-title fw-bolder fs-6 mb-2">Tambah Kategori</h5>
                    <h6 class="fw-semibold text-muted fs-2  mb-4"><span class="text-danger">*</span>isi kolom dibawah dengan
                        benar<span class="text-danger">*</span></h6>
                    <div class="card" style="background: #f3f4f6">
                        <div class="card-body">
                            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_categori" class="form-label">Nama</label>
                                    <input type="text" name="nama_categori" id="nama_categori"
                                        class="form-control  @error('nama_categori') is-invalid @enderror"
                                        :value="old('nama_categori')">
                                    @error('nama_categori')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <a class="btn mt-1 mx-2 text-white" href="{{ route('category.index') }}" role="button"
                                    style="background-color: #dc3545">Batal</a>
                                <button type="submit" class="btn bg-black text-white mt-1">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

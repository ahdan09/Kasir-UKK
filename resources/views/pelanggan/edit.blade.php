@extends('layout.master')

@section('content')
    <div class="container-fluid">
        <div class="card bg-white">
            <div class="card-body">
                <h5 class="card-title fw-bolder fs-6 mb-2">Edit Pelanggan</h5>
                <h6 class="fw-semibold text-muted fs-2  mb-4"><span class="text-danger">*</span>isi kolom dibawah dengan
                    benar<span class="text-danger">*</span></h6>
                <div class="card" style="background: #f3f4f6">
                    <div class="card-body">
                        <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="pelanggan" class="form-label">Nama</label>
                                <input type="text" name="pelanggan" id="pelanggan"
                                    class="form-control  @error('pelanggan') is-invalid @enderror"
                                    value="{{ $pelanggan->pelanggan }}">
                                @error('pelanggan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="alamat" class="form-label shadow-md text-muted">Alamat</label>
                                <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{ $pelanggan->alamat }}</textarea>
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="telepon" class="form-label">telepon</label>
                                <input type="number" name="telepon" id="telepon"
                                    class="form-control @error('telepon') is-invalid @enderror"
                                    value="{{ $pelanggan->telepon }}">
                                @error('telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <a class="btn mt-1 mx-2 text-white" href="{{ route('pelanggan.index') }}" role="button"
                                style="background-color: #dc3545">Batal</a>
                            <button type="submit" class="btn bg-black text-white mt-1">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

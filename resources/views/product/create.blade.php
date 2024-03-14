@extends('layout.master')

@section('content')
    @if (Auth::user()->role === 'admin')
        <div class="container-fluid">
            <div class="card bg-white">
                <div class="card-body">
                    <h5 class="card-title fw-bolder fs-6 mb-2">Tambah Produk</h5>
                    <h6 class="fw-semibold text-muted fs-2  mb-4"><span class="text-danger">*</span>isi kolom dibawah dengan
                        benar<span class="text-danger">*</span></h6>
                    <div class="card" style="background: #f3f4f6">
                        <div class="card-body">
                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="id_categori" class="form-label">Kategori</label>
                                    <select class="form-select" name="id_categori" id="id_categori">
                                        <option selected>Select one</option>
                                        @foreach ($categories as $categori)
                                            <option value="{{ $categori->id }}">{{ $categori->nama_categori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Produk</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control  @error('name') is-invalid @enderror" :value="old('name')">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="harga_beli" class="form-label">Harga Beli</label>
                                    <input type="number" name="harga_beli" id="harga_beli"
                                        class="form-control @error('harga_beli') is-invalid @enderror"
                                        :value="old('harga_beli')">
                                    @error('harga_beli')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="harga_jual" class="form-label">Harga Jual</label>
                                    <input type="number" name="harga_jual" id="harga_jual"
                                        class="form-control @error('harga_jual') is-invalid @enderror"
                                        :value="old('harga_jual')">
                                    @error('harga_jual')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="stock" class="form-label">Stock</label>
                                    <input type="number" name="stock" id="stock"
                                        class="form-control @error('stock') is-invalid @enderror" :value="old('stock')">
                                    @error('stock')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <a class="btn mt-1 mx-2 text-white" href="{{ route('product.index') }}" role="button"
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

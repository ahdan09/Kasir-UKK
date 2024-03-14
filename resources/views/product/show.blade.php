@extends('layout.master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold fs-6 mb-4">Detail Produk</h5>
            <div class="card" style="background: #f3f4f6">
                <div class="card-body">
                    <div class="col mb-5 mt-3">
                        <h1 class="fw-medium fs-4 text-muted">Tanggal Dibuat :</h1>
                        <h1 class="fw-bolder fs-5">{{ $product->created_at->format('H:i, d M y') }}</h1>
                    </div>
                    <div class="col mb-5 mt-3">
                        <h1 class="fw-medium fs-4 text-muted">kategori :</h1>
                        <h1 class="fw-bolder fs-5">{{ $product->category->nama_categori }}</h1>
                    </div>
                    <div class="col mb-5 mt-3">
                        <h1 class="fw-medium fs-4 text-muted">Nama Produk :</h1>
                        <h1 class="fw-bolder fs-5">{{ $product->name }}</h1>
                    </div>
                    <div class="col mb-5 mt-3">
                        <h1 class="fw-medium fs-4 text-muted">Harga Beli :</h1>
                        <h1 class="fw-bolder fs-5">Rp{{ number_format($product->harga_beli, 0, ',', '.') }},-</h1>
                    </div>
                    <div class="col mb-5 mt-3">
                        <h1 class="fw-medium fs-4 text-muted">Harga Jual :</h1>
                        <h1 class="fw-bolder fs-5">Rp{{ number_format($product->harga_jual, 0, ',', '.') }},-</h1>
                    </div>
                    <div class="col mb-3 mt-3">
                        <h1 class="fw-medium fs-4 text-muted">Stok :</h1>
                        <h1 class="fw-bolder fs-5">{{ $product->stock }}</h1>
                    </div>
                </div>
            </div>
            <a class="btn btn-primary" href="{{ route('product.index') }}" role="button">Kembali</a>
        </div>
    </div>
</div>
@endsection

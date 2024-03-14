@extends('layout.master')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold fs-6 mb-4">Detail Transaksi</h5>
                <div class="card" style="background: #f3f4f6">
                    <div class="card-body">
                        <div class="col mb-5 mt-3">
                            <h1 class="fw-medium fs-4 text-muted">ID Transaksi :</h1>
                            <h1 class="fw-bolder fs-5">{{ $transaksi->id }}</h1>
                        </div>
                        <div class="col mb-5 mt-3">
                            <h1 class="fw-medium fs-4 text-muted">No Nota :</h1>
                            <h1 class="fw-bolder fs-5">{{ $transaksi->nota }}</h1>
                        </div>
                        <div class="col mb-5 mt-3">
                            <h1 class="fw-medium fs-4 text-muted">Pelanggan :</h1>
                            <h1 class="fw-bolder fs-5">{{ $transaksi->pelanggan->pelanggan }}</h1>
                        </div>
                        <div class="col mb-5 mt-3">
                            <h1 class="fw-medium fs-4 text-muted">Kasir :</h1>
                            <h1 class="fw-bolder fs-5">{{ $transaksi->kasir }}</h1>
                        </div>
                        <div class="col mb-5 mt-3">
                            <h1 class="fw-medium fs-4 text-muted">Waktu :</h1>
                            <h1 class="fw-bolder fs-5">{{ $transaksi->created_at->format('H:i, d M y') }}</h1>
                        </div>
                        <div class="col mb-5 mt-3">
                            <h1 class="fw-medium fs-4 text-muted">Detail Produk :</h1>
                            <div class="card">
                                <div class="card-body">
                                    <div class="overflow-auto">
                                        <div style="height: 220px">
                                            <table id="cartTable" class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Nama Product</th>
                                                        <th scope="col">Harga Satuan</th>
                                                        <th scope="col">Qty</th>
                                                        <th scope="col">Sub Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($transaksi->detailTransaksi as $detail)
                                                    <tr>
                                                        <td class="text-center font-bold">{{ $loop->iteration }}</td>
                                                        <td>{{ $detail->product->name }}</td>
                                                        <td>Rp {{ number_format($detail->product->harga_jual, 0, ',', '.') }}</td>
                                                        <td>{{ $detail->quantity }}</td>
                                                        <td class="text-center">Rp {{ number_format($detail->sub_total, 0, ',', '.') }}</td>
                                                    </tr>
                                                    @endforeach
                                                  </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-5 mt-3">
                            <h1 class="fw-medium fs-4 text-muted">Metode Pembayaran :</h1>
                            <h1 class="fw-bolder fs-5">{{ $transaksi->pembayaran }}</h1>
                        </div>
                        <div class="col mb-5 mt-3">
                            <h1 class="fw-medium fs-4 text-muted">Total Pesanan :</h1>
                            <h1 class="fw-bolder fs-5">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</h1>
                        </div>
                    </div>
                </div>
                <a class="btn btn-primary" href="{{ route('transaksi.index') }}" role="button">Kembali</a>
            </div>
        </div>
    </div>
@endsection

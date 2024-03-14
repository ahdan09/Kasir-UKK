<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Nota</title>
</head>

<body>
    <div class="d-flex justify-content-center">
        <div class="col-4">
            <div class="card">
            </div>
            <div class="card-body mx-4">
                <div class="container">
                    <a href="{{ route('transaksi.index') }}" class="text-nowrap logo-img text-center d-block py-4 w-100 ">
                        <img src="{{ asset('/src/assets/images/logos/logo-kasir.png') }}" width="180"
                            alt="">
                    </a>
                    <div class="row">
                        <ul class="list-unstyled">
                            <li class="text-black ">Pelanggan : {{ $transaksi->pelanggan->pelanggan }}</li>
                            <li class="text-black mt-1 "><span class="text-black">Nota : </span>{{ $transaksi->nota }}</li>
                            <li class="text-black mt-1">Tanggal : {{ $transaksi->created_at->format('H:i, d M y') }}</li>
                        </ul>
                        <hr>
                        @foreach ($transaksi->detailTransaksi as $detail)
                        <div class="col-xl-12 mb-1 fw-bolder">{{ $detail->product->name }}</div>
                        <div class="col-xl-4">
                            <p>{{ $detail->quantity }}</p>
                        </div>
                        <div class="col-xl-8">
                            <p class="float-end">Rp {{ number_format($detail->sub_total, 0, ',', '.') }}
                            </p>
                        </div>
                        <hr>
                        @endforeach

                        <hr style="border: 2px solid black;">
                    </div>
                    <div class="row text-black">

                        <div class="col-xl-12">
                            <p class="float-end fw-bold">Total : Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                            </p>
                        </div>
                        <hr style="border: 2px solid black;">
                    </div>
                    <div class="text-center" style="margin-top: 45px;">
                        <p>Terima Kasih Sudah Berbelanja di Toko Kami</p>
                    </div>
                    <a href="{{ route('transaksi.index') }}" class="btn btn-primary mb-4" role="button">
                        <i class="fa-solid fa-arrow-left" style="margin-right: 8px"></i>kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/c0c6839ed1.js" crossorigin="anonymous"></script>

</body>

</html>

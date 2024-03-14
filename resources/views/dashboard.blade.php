@extends('layout.master')

@section('content')
    <div class="container-fluid">
        <div class="col-lg-12 row">
            <div class="col-lg-6">
                <div class="card rounded-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5 d-flex">
                                <div class="bg-danger py-3 px-4 rounded-2 text-white"
                                    style="font-size: 35px; margin-left: 35px; margin-right: 20px;">
                                    <i class="fa-solid fa-user-tie"></i>
                                </div>
                                <div class="col-lg-12">
                                    <h6 style=" font-weight: bolder; font-size: 40px;">{{ $users }}</h6>
                                    <h6 style=" font-size: 17px; font-weight: 600; color: #6b7280;">
                                        Jumlah Petugas
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card rounded-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5 d-flex">
                                <div class="bg-primary py-3 px-4 rounded-2 text-white"
                                    style="font-size: 35px; margin-left: 35px; margin-right: 20px;">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div class="col-lg-12">
                                    <h6 style=" font-weight: bolder; font-size: 40px;">{{ $pelanggans }}</h6>
                                    <h6 style=" font-size: 17px; font-weight: 600; color: #6b7280;">
                                        Jumlah Pelanggan
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card rounded-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5 d-flex">
                                <div class="bg-secondary py-3 px-4 rounded-2 text-white"
                                    style="font-size: 35px; margin-left: 35px; margin-right: 20px;">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </div>
                                <div class="col-lg-12">
                                    <h6 style=" font-weight: bolder; font-size: 40px;">{{ $products }}</h6>
                                    <h6 style=" font-size: 17px; font-weight: 600; color: #6b7280;">
                                        Jumlah Product
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card rounded-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5 d-flex">
                                <div class="bg-success py-3 px-4 rounded-2 text-white"
                                    style="font-size: 35px; margin-left: 35px; margin-right: 20px;">
                                    <i class="fa-solid fa-money-bill"></i>
                                </div>
                                <div class="col-lg-12">
                                    <h6 style=" font-weight: bolder; font-size: 40px;">{{ $transaksis }}</h6>
                                    <h6 style=" font-size: 17px; font-weight: 600; color: #6b7280;">
                                        Jumlah Transaksi
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

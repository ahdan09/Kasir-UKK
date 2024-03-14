@extends('layout.master')

@section('content')
    <div class="px-3 py-5 ">
        <a href="{{ route('transaksi.index') }}" class="btn btn-primary mb-4 w-25 " role="button">
            <i class="fa-solid fa-arrow-left" style="margin-right: 8px"></i>kembali
        </a>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold fs-6 mb-4">Pembayaran</h5>
                <form action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data" id="mainForm">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="id_pelanggan" class="form-label">Pelanggan</label>
                                <select class="form-select" name="id_pelanggan" id="id_pelanggan" required>
                                    <option value="" selected>--Pilih Member--</option>
                                    @foreach ($pelanggans as $pelanggan)
                                        <option value="{{ $pelanggan->id }}">{{ $pelanggan->pelanggan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="product" id="productHidden">
                        <input type="hidden" name="total_pesanan" id="total_harga">
                        <hr class="border-bottom border-1 border-dark mb-4 mt-3">
                        <div class="col-12">
                            <div class="card" style="background: #f3f4f6">
                                <div class="card-body row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="product_id" class="form-label">Product</label>
                                            <select class="form-select" id="product_id">
                                                <option value="" selected>--Pilih Product--</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="quantity" class="form-label">Quantity</label>
                                            <input type="number" class="form-control" name="quantity" id="quantity"
                                                min="1" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <table id="product_table" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nama Product</th>
                                                    <th scope="col">Stock</th>
                                                    <th scope="col">Harga Satuan</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12 mb-3 mt-3">
                                        <label for="sub_total" class="form-label">Estimasi harga</label>
                                        <input type="text" class="form-control" id="sub_total" readonly>
                                        <input type="hidden" id="sub_total_hidden" readonly>
                                        <input type="hidden" id="product_name" readonly>
                                    </div>
                                    <button type="button" class="btn btn-primary mt-3" id="addcartProduct">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr class="border-bottom border-1 border-dark mb-4 mt-3">
                        <div class="col-12 row">
                            <div class="col-7">
                                <div class="card">
                                    <div class="card-body" style="background: #f3f4f6">
                                        <h6 class="mb-4 fs-3 fw-bolder">Keranjang</h6>
                                        <div class="overflow-auto">
                                            <div style="height: 220px">
                                                <table id="cartTable" class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Nama Product</th>
                                                            <th scope="col">Qty</th>
                                                            <th scope="col">Total</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-size: 12px">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="card" style="height: 300px;">
                                    <div class="card-body" style="background: #f3f4f6">
                                        <h6 class="mb-4 fs-3 fw-bolder">Ringkasan Pesanan</h6>
                                        <div class="mb-4">
                                            <h1 class="fw-semibold  text-muted fs-6">Total Pesanan</h1>
                                            <h1 id="total-pesanan" class="fw-bolder text-primary">Rp 1.000.000</h1>
                                        </div>
                                        <div class="mb-2">
                                            <label for="pembayaran" class="form-label shadow-md ">Payment</label>
                                            <select name="pembayaran" id="pembayaran" class="form-select">
                                                @foreach ($paymentOption as $value => $label)
                                                    <option value="{{ $value }}">{{ $label }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3 w-100">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        let cart = [];
        $(document).ready(function() {
            displayCart();
            let productName;
            let productPrice;
            let stock;

            $('#product_id').change(function() {
                const productId = $('#product_id')
                    .val();
                $('#quantity').attr('disabled', false);

                $.ajax({
                    url: '{{ url('get-product-details') }}/' + productId,
                    type: 'GET',
                    success: function(data) {
                        const formattedPrice = formatRupiah(data.harga_jual);

                        productName = data.name;
                        productPrice = data.harga_jual;
                        stock = data.stock;

                        $('#product_name').val(data.name);
                        $('#product_table tbody').html('');
                        var row = '<tr>' +
                            '<td>1</td>' +
                            '<td>' + productName + '</td>' +
                            '<td>' + stock + '</td>' +
                            '<td>' + formattedPrice + '</td>' +
                            '</tr>';

                        $('#product_table tbody').append(row);
                    },
                });
            });



            $('#quantity').on('input', function() {
                const quantity = $(this).val();

                if (quantity > stock) {
                    $('#addcartProduct').attr('disabled', true);
                    $('#quantity').addClass('focus:border-red-600');
                    $('#sub_total').val('');
                } else {
                    $('#addcartProduct').attr('disabled', false);
                    $('#quantity').removeClass('focus:border-red-600');

                    let sub_total = productPrice * quantity;
                    const formattedTotal = formatRupiah(sub_total);
                    $('#sub_total').val(formattedTotal);
                    $('#sub_total_hidden').val(sub_total);
                }
            });

            $('#addcartProduct').click(function(e) {
                e.preventDefault();

                const productId = $('#product_id').val();
                const productName = $('#product_name').val();
                const quantity = $('#quantity').val();
                const subTotal = $('#sub_total_hidden').val();

                const product = {
                    productId,
                    productName,
                    quantity,
                    subTotal,
                };

                addToCart(product);

                $('#product_id').val('');
                $('#quantity').val('').attr('disabled', true);
                $('#stock').val('');
                $('#harga_jual').val('');
                $('#sub_total').val('');
                $('#sub_total_hidden').val('');

                displayCart();
            });

            $('#mainForm').submit(function() {
                sessionStorage.removeItem('cart');
                return true;
            });

            function displayCart() {
                let cartFromSession = JSON.parse(sessionStorage.getItem('cart')) || [];
                let tableBody = $('#cartTable tbody');
                let tableHead = $('#cartTable thead');
                let TotalPesananElement = $('#total-pesanan');

                tableBody.empty();

                if (cartFromSession.length === 0) {
                    tableBody.html(
                        '<tr><td colspan="5" class="text-center fs-3">Tidak ada product.</td></tr>');
                    tableHead.hide();
                    updateTotalPesanan(0);
                } else {
                    tableHead.show();
                    let TotalPesanan = 0;
                    cartFromSession.forEach(function(product, index) {
                        const formattedSubTotal = formatRupiah(product.subTotal);
                        TotalPesanan += parseFloat(product.subTotal);
                        let row = `<tr>
                                        <td class="text-center font-bold">${index + 1}</td>
                                        <td>${product.productName}</td>
                                        <td>${product.quantity}</td>
                                        <td>${formattedSubTotal}</td>
                                        <td><button class="btn text-white px-2 py-1" style="background-color: #dc3545" onclick="removeProduct(${index})"><i class="ti ti-trash"></i></button></td>
                                    </tr>`;

                        tableBody.append(row);
                    });

                    updateTotalPesanan(TotalPesanan);
                    updateProductHidden(cartFromSession);
                }
            }

            window.removeProduct = function(index) {
                let cartFromSession = JSON.parse(sessionStorage.getItem('cart')) || [];

                cartFromSession.splice(index, 1);
                cart.splice(index, 1);

                saveCartToSession(cartFromSession);

                displayCart();
            };

            function addToCart(product) {
                cart.push(product);
                saveCartToSession(cart);
                displayCart();
            }

            function saveCartToSession(cart) {
                sessionStorage.setItem('cart', JSON.stringify(cart));
            }

            function updateTotalPesanan(total) {
                const formattedTotalPesanan = formatRupiah(total) + ',-';
                $('#total-pesanan').text(formattedTotalPesanan);
                $('#total_harga').val(total);
            }

            function updateProductHidden(cart) {
                $('#productHidden').val(JSON.stringify(cart));
            }

            function formatRupiah(angka) {
                var numberString = angka.toString();
                var split = numberString.split(',');
                var sisa = split[0].length % 3;
                var rupiah = split[0].substr(0, sisa);
                var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
                return 'Rp ' + rupiah;
            }
        });
    </script>
@endsection

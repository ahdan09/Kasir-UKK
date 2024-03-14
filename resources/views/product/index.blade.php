@extends('layout.master')

@section('content')
    <div class="container-fluid">
        <div class="card bg-white">
            <div class="card-body">
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('product.create') }}" class="btn btn-primary mb-4" role="button">
                        <i class="fa-solid fa-cart-plus" style="margin-right: 8px"></i>Tambah
                    </a>
                @endif
                <h5 class="card-title fw-bolder fs-6 mb-4">Data Produk</h5>
                <div class="card" style="background: #f3f4f6">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Harga beli</th>
                                    <th scope="col">Harga jual</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $product->category->nama_categori }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>Rp{{ number_format($product->harga_beli, 0, ',', '.') }}</td>
                                        <td>Rp{{ number_format($product->harga_jual, 0, ',', '.') }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td class="d-flex">
                                            <a class="btn btn-warning px-2 py-1"
                                                href="{{ route('product.show', $product->id) }}" role="button"><i
                                                    class="ti ti-eye"></i></a>
                                            @if (Auth::user()->role === 'admin')
                                                <a class="btn btn-primary px-2 py-1 mx-2 "
                                                    href="{{ route('product.edit', $product->id) }}" role="button"><i
                                                        class="ti ti-pencil"></i></a>
                                                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn px-2 py-1 text-white"
                                                        style="background-color: #dc3545"type="submit"
                                                        onclick="Delproduct(event)"><i class="ti ti-trash"></i></button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    <script>
        function Delproduct(event) {
            event.preventDefault();

            console.log("Button clicked");
            Swal.fire({
                title: 'Apa anda yakin?',
                text: 'Anda tidak akan dapat memulihkan data Pelanggan ini!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batalkan'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.closest('form').submit();
                }
            });
        }
    </script>
@endsection

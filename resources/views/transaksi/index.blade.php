@extends('layout.master')

@section('content')
    <div class="container-fluid">
        <div class="card bg-white">
            <div class="card-body">
                <a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-4 w-100 p-2" role="button">
                    <i class="fa-solid fa-plus" style="margin-right: 8px"></i>Buat Transaksi Baru
                </a>
                <h5 class="card-title fw-bolder fs-6 mb-4">Data Transaksi</h5>
                <div class="card" style="background: #f3f4f6">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Pelanggan</th>
                                    <th scope="col">Kasir</th>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col">Pembayaran</th>
                                    <th scope="col">Waktu</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksis as $transaksi)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $transaksi->pelanggan->pelanggan }}</td>
                                        <td>{{ $transaksi->kasir }}</td>
                                        <td>{{ $transaksi->total_harga }}</td>
                                        <td>{{ $transaksi->pembayaran }}</td>
                                        <td>{{ $transaksi->created_at->format('j F, Y') }}</td>
                                        <td class="d-flex">
                                            <a class="btn btn-warning px-2 py-1"
                                            href="{{ route('transaksi.show', $transaksi->id) }}" role="button"><i
                                                class="ti ti-eye"></i></a>
                                            <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn px-2 py-1 mx-2 text-white"
                                                    style="background-color: #dc3545"type="submit"
                                                    onclick="Deltransaksi(event)"><i class="ti ti-trash"></i></button>
                                            </form>
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
        function Deltransaksi(event) {
            event.preventDefault();

            console.log("Button clicked");
            Swal.fire({
                title: 'Apa anda yakin?',
                text: 'Anda tidak akan dapat memulihkan data transaksi ini!',
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


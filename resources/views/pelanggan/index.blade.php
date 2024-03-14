@extends('layout.master')

@section('content')
    <div class="container-fluid">
        <div class="card bg-white">
            <div class="card-body">
                <a href="{{ route('pelanggan.create') }}" class="btn btn-primary mb-4" role="button">
                    <i class="fa-solid fa-user-plus" style="margin-right: 8px"></i>Tambah
                </a>
                <h5 class="card-title fw-bolder fs-6 mb-4">Data Pelanggan</h5>
                <div class="card" style="background: #f3f4f6">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Telepon</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelanggans as $pelanggan)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $pelanggan->pelanggan }}</td>
                                        <td>{{ $pelanggan->alamat }}</td>
                                        <td>{{ $pelanggan->telepon }}</td>
                                        <td class="d-flex">
                                            <a class="btn btn-primary px-2 py-1"
                                                href="{{ route('pelanggan.edit', $pelanggan->id) }}" role="button"><i
                                                    class="ti ti-pencil"></i></a>
                                            <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn px-2 py-1 mx-2 text-white"
                                                    style="background-color: #dc3545"type="submit"
                                                    onclick="Delpelanggan(event)"><i class="ti ti-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $pelanggans->links() }}
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    <script>
        function Delpelanggan(event) {
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

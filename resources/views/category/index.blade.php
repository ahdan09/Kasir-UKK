@extends('layout.master')

@section('content')
    <div class="container-fluid">
        <div class="card bg-white">
            <div class="card-body">
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('category.create') }}" class="btn btn-primary mb-4" role="button">
                        <i class="fa-solid fa-list" style="margin-right: 8px"></i>Tambah
                    </a>
                @endif
                <h5 class="card-title fw-bolder fs-6 mb-4">Data Kategori</h5>
                <div class="card" style="background: #f3f4f6">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama kategori</th>
                                    @if (Auth::user()->role === 'admin')
                                        <th scope="col">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $category->nama_categori }}</td>
                                        <td class="d-flex">
                                            @if (Auth::user()->role === 'admin')
                                                <form action="{{ route('category.destroy', $category->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn px-2 py-1 text-white"
                                                        style="background-color: #dc3545"type="submit"
                                                        onclick="Delcategory(event)"><i class="ti ti-trash"></i></button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    <script>
        function Delcategory(event) {
            event.preventDefault();

            console.log("Button clicked");
            Swal.fire({
                title: 'Apa anda yakin?',
                text: 'Anda tidak akan dapat memulihkan data Kategori ini!',
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

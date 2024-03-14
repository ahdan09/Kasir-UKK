@extends('layout.master')

@section('content')
    <div class="container-fluid">
        <div class="card bg-white">
            <div class="card-body">
                <a href="{{ route('user.create') }}" class="btn btn-primary mb-4" role="button">
                    <i class="fa-solid fa-user-plus" style="margin-right: 8px"></i>Tambah
                </a>
                <h5 class="card-title fw-bolder fs-6 mb-4">Data Users</h5>
                <div class="card" style="background: #f3f4f6">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td class="d-flex">
                                            <a class="btn btn-primary px-2 py-1" href="{{ route('user.edit', $user->id) }}"
                                                role="button"><i class="ti ti-pencil"></i></a>
                                            @if ($user->email != Auth::user()->email)
                                                <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn px-2 py-1 mx-2 text-white"
                                                        style="background-color: #dc3545"type="submit"
                                                        onclick="DelUser(event)"><i class="ti ti-trash"></i></button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $users->links() }}
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    <script>
        function DelUser(event) {
            event.preventDefault();

            console.log("Button clicked");
            Swal.fire({
                title: 'Apa anda yakin?',
                text: 'Anda tidak akan dapat memulihkan data User ini!',
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

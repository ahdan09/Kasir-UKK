@extends('layout.master')

@section('content')
    <div class="container-fluid">
        <div class="card bg-white">
            <div class="card-body">
                <h5 class="card-title fw-bolder fs-6 mb-2">Tambah Users</h5>
                <h6 class="fw-semibold text-muted fs-2  mb-4"><span class="text-danger">*</span>isi kolom dibawah dengan
                    benar<span class="text-danger">*</span></h6>
                <div class="card" style="background: #f3f4f6">
                    <div class="card-body">
                        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" id="name"
                                    class="form-control  @error('name') is-invalid @enderror" :value="old('name')">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" :value="old('email')">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="alamat" class="form-label shadow-md text-muted">Alamat</label>
                                <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"></textarea>
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="telepon" class="form-label">telepon</label>
                                <input type="number" name="telepon" id="telepon"
                                    class="form-control @error('telepon') is-invalid @enderror" :value="old('telepon')">
                                @error('telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label shadow-md text-muted">Role</label>
                                <select name="role" id="role" class="form-select">
                                    @foreach ($roleOption as $value => $label)
                                        <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" :value="old('password')">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <a class="btn mt-1 mx-2 text-white" href="{{ route('user.index') }}" role="button"
                                style="background-color: #dc3545">Batal</a>
                            <button type="submit" class="btn bg-black text-white mt-1">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

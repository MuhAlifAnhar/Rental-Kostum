@extends('layout.admin')

@section('title')
    <title>Admin Panel | Toko</title>
@endsection

@section('body')
    <div class="col-lg-8 mt-4">
        <form method="post" action="/admin/toko">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama toko</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama"
                    required autofocus value="{{ old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="akun_admin">Akun Admin Toko</label>
                <select name="akun_admin" class="form-control @error('akun_admin') is-invalid @enderror" id="akun_admin"
                    required value="{{ old('akun_admin') }}">
                    @error('akun_admin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    @foreach ($admin as $akuna)
                        <option value="{{ $akuna->id }}">{{ $akuna->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Membuat Toko</button>
        </form>
    </div>
@endsection

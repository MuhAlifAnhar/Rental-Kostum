@extends('layout.admin')

@section('title')
    <title>Admin Panel | Kostum</title>
@endsection

@section('body')
    <div class="col-lg-8 mt-4">
        <form method="post" action="{{ url('admin/transaksi/' . $transaksi->id) }}">
            @method('put')
            @csrf
            <div class="form-group mb-3">
                <label for="nama_toko" class="pb-2">Status</label>
                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                    <option value="">-- select status --</option>
                    <option value="success">Success</option>
                    <option value="failed">Failed</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection

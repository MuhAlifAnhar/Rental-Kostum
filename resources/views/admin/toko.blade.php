@extends('layout.admin')

@section('title')
    <title>Admin Panel | Toko</title>
@endsection

@section('body')
    @if (session()->has('sukses'))
        <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('sukses') }}
        </div>
    @endif

    <div class="pb-3 mt-4">
        <a href="/admin/toko/create" class="btn btn-success">
            <i class="fas fa-plus"></i> Buat Nama Toko
        </a>
    </div>

    <div class="table-responsive col-lg-12">
        <table id="myTable" class="table table-striped table-bordered display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Toko</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($toko as $nama)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $nama->nama_toko }}</td>
                        <td>
                            <form action="{{ url('/admin/toko/' . $nama->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Kamu yakin mau hapus toko?')">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

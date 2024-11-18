@extends('layout.admin')

@section('title')
    <title>Admin Panel | Toko</title>
@endsection

@section('body')
    @if (session()->has('sukses'))
        <div class="alert alert-success mt-3" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('sukses') }}
        </div>
    @endif

    <div class="pb-3 mt-4">
        <a href="/admin/produk/create" class="btn btn-success">
            <i class="fas fa-plus"></i> Buat Produk Kostum
        </a>
    </div>

    <div class="table-responsive col-lg-12">
        <table id="myTable" class="table table-striped table-bordered display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    {{-- <th>Deskripsi</th> --}}
                    <th>Harga</th>
                    <th>Image</th>
                    <th>Nama Toko</th>
                    <th>Keterangan Sewa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($baju as $nama)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $nama->nama }}</td>
                        {{-- <td>{{ $nama->deskripsi }}</td> --}}
                        <td>{{ $nama->harga }}</td>
                        <td><img src="{{ asset('storage/' . $nama->image) }}" alt="Image {{ $nama->nama }}"
                                class="img-thumbnail" width="100"></td>
                        <td>{{ $nama->toko->nama_toko }}</td>
                        <td>{{ $nama->keterangan->nama_keterangan }}</td>
                        <td class="d-flex">
                            <a href="{{ url('admin/produk/' . $nama->id . '/edit') }}"
                                class="btn btn-sm btn-warning me-2 text-white">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ url('/admin/produk/' . $nama->id) }}" method="post"
                                onsubmit="return confirm('Kamu yakin mau hapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
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

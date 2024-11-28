@extends('layout.admin')

@section('title')
    <title>
        Admin Panel | Transaksi</title>
@endsection

@section('body')
    @if (session()->has('sukses'))
        <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('sukses') }}
        </div>
    @endif

    <div class="table-responsive col-lg-12 pt-5">
        <table id="myTable" class="table table-striped table-bordered display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pembeli</th>
                    <th>Email</th>
                    {{-- <th>Nama Kostum</th> --}}
                    <th>Status</th>
                    <th>File</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $nama)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $nama->name }}</td>
                        <td>{{ $nama->email }}</td>
                        {{-- <td>{{ $nama->kostum->nama }}</td> --}}
                        <td>
                            @if ($nama->status == 'success')
                                <span class="badge bg-success">Sukses</span>
                            @elseif ($nama->status == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @else
                                <span class="badge bg-danger">Failed</span>
                            @endif
                        </td>
                        <td><img src="{{ asset('storage/' . $nama->file) }}" alt="Image {{ $nama->name }}"
                                class="img-thumbnail" width="100"></td>
                        <td class="d-flex">
                            <a href="{{ url('admin/transaksi/' . $nama->id . '/edit') }}"
                                class="btn btn-sm btn-warning me-2 text-white">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ url('/admin/transaksi/' . $nama->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Kamu yakin mau hapus transaksi?')">
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

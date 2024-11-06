@extends('layout.admin')

@section('title')
    <title>Admin Panel | Request</title>
@endsection

@section('body')
    @if (Session::has('sukses'))
        <div class="alert alert-success alert-fixed" role="alert">
            {{ Session::get('sukses') }}
        </div>
    @endif

    <div class="col-lg-12 mt-4">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Akun User</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($super as $nama)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $nama->nama }}</td>
                        <td>
                            <form action="{{ url('/admin/request/' . $nama->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="badge bg-danger border-0"
                                    onclick="return confirm('Kamu yakin mau hapus akun?')">
                                    <span data-feather="x-circle"></span> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

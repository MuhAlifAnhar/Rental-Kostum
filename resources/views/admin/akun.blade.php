@extends('layout.admin')

@section('title')
    <title>Admin Panel | Request</title>
@endsection

@section('body')
    @if (Session::has('sukses'))
        <div class="alert alert-success my-3 alert-fixed" role="alert">
            <i class="fas fa-check-circle"></i> {{ Session::get('sukses') }}
        </div>
    @endif

    <div class="table-responsive col-lg-12 mt-4">
        <table id="myTable" class="table table-striped table-bordered display">
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
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Kamu yakin mau hapus akun?')">
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

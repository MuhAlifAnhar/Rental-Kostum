@extends('layout.navbar')

@section('title')
    <title>Rental Kostum | Kostum</title>
@endsection

@section('body')
    <div class="container pt-5">
        <div class="text-center">
            <h3 class="pt-5 mb-5">Silahkan Pilih Kostum Yang Anda Inginkan</h3>
        </div>
        @if (Session::has('sukses'))
            <div class="alert alert-success my-3 alert-fixed" role="alert">
                <i class="fas fa-check-circle"></i> {{ Session::get('sukses') }}
            </div>
        @endif
        @if ($errors->has('baju'))
            <div class="alert alert-danger my-3 alert-fixed" role="alert">
                {{ $errors->first('baju') }}
            </div>
        @endif
        <div class="row pb-5 pt-3 text-center">
            <ul class="nav nav-pills d-inline-flex justify-content-center mb-5">
                @foreach ($tokos as $toko)
                    <li class="nav-item p-2">
                        <a href="{{ route('kostum.byToko', ['tokoId' => $toko->id]) }}"
                            class="d-flex mx-2 py-2 border border-primary bg-light rounded-pill active text-decoration-none text-dark">
                            <span class="text-dark" style="width: 150px;">{{ $toko->nama_toko }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="row pb-5">
            @if ($baju->isEmpty())
                <div class="col-md-12">
                    <p class="text-center">Pilih toko untuk melihat kostum.</p>
                </div>
            @else
                @foreach ($baju as $b)
                    <div class="col-md-3 d-flex justify-content-center mb-4">
                        <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal"
                            data-bs-target="#modalBook">
                            <div class="card text-center ad" style="width: 18rem;" data-baju-id="{{ $b->id }}">
                                <img src="{{ asset('storage/' . $b->image) }}" class="card-img-top"
                                    alt="{{ $b->nama }}">
                                <div class="card-body m-0 p-0">
                                    <p class="card-text bold">{{ $b->nama }}</p>
                                    <p class="card-text bold">{{ $b->deskripsi }}</p>
                                    <p class="card-text">Rp. {{ number_format($b->harga, 0, ',', '.') }}</p>
                                    <p class="card-text">
                                        @php
                                            $latestTransaksi = $b->transaksi
                                                ->where('status', '!=', 'failed')
                                                ->sortByDesc('created_at');
                                        @endphp
                                        @if ($latestTransaksi)
                                            @foreach ($latestTransaksi as $transaksi)
                                                <p>
                                                    Pesan dari: <strong>{{ $transaksi->date }}</strong>
                                                    sampai <strong>{{ $transaksi->tanggal_pengembalian }}</strong>
                                                </p>
                                            @endforeach
                                        @else
                                            <em>Belum ada informasi tanggal pemesanan</em>
                                        @endif
                                    </p>
                                    @if ($b->nama_keterangan == 1)
                                        <p class="card-footer bg-danger bold sewa text-white"
                                            data-status="{{ $b->keterangan->nama_keterangan }}">
                                            {{ $b->keterangan->nama_keterangan }}
                                        </p>
                                    @elseif ($b->nama_keterangan == 2)
                                        <p class="card-footer bg-warning bold sewa text-white"
                                            data-status="{{ $b->keterangan->nama_keterangan }}">
                                            {{ $b->keterangan->nama_keterangan }}
                                        </p>
                                    @elseif ($b->nama_keterangan == 3)
                                        <p class="card-footer bg-success bold sewa text-white"
                                            data-status="{{ $b->keterangan->nama_keterangan }}">
                                            {{ $b->keterangan->nama_keterangan }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    @include('user._modal-book')


@endsection

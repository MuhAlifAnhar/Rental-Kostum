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
                                    <div class="calendar mt-3 mb-3">
                                        <div class="d-flex flex-wrap justify-content-center">
                                            @php
                                                $bookedDates = $b->transaksi
                                                    ->where('status', '!=', 'failed')
                                                    ->pluck('date')
                                                    ->toArray();
                                            @endphp

                                            @for ($day = 1; $day <= 30; $day++)
                                                @php
                                                    $date = date('Y-m-') . str_pad($day, 2, '0', STR_PAD_LEFT);
                                                    $isBooked = in_array($date, $bookedDates);
                                                @endphp
                                                <div
                                                    class="date-box {{ $isBooked ? 'bg-danger' : 'bg-success' }} text-white m-1">
                                                    {{ $day }}
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                    {{-- @if ($b->nama_keterangan == 1)
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
                                    @endif --}}
                                    <p class="card-footer bg-success bold sewa text-white" data-status="ready">
                                        Ready
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <style>
        .date-box {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
        }
    </style>

    @include('user._modal-book')


@endsection

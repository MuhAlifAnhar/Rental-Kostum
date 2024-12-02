@extends('layout.admin')

@section('title')
    <title>Admin Panel | Dashboard</title>
@endsection

@section('body')
    <div class="container mt-4">
        <h1>Welcome to Admin Dashboard</h1>
        <p>This is your main control panel where you can manage your application.</p>

        <!-- Example Cards for Admin Features -->
        <!-- Link Font Awesome CSS di head -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <div class="row">
            @can('isSuper')
                <div class="col-md-4">
                    <a href="/admin/toko" class="text-decoration-none">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="fas fa-store"></i> Toko
                                </h5>
                                <p class="card-text">Kelola nama toko admin Anda.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="/admin/request" class="text-decoration-none">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="fas fa-inbox"></i> Request Toko
                                </h5>
                                <p class="card-text">Melihat request toko dari admin Anda.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="container mt-4">
                    <h3>Ringkasan Transaksi Per Toko</h3>
                    <div class="row">
                        @foreach ($data as $store)
                            <div class="col-md-4">
                                <div class="card text-white bg-warning mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <i class="fas fa-store"></i> {{ $store->nama_toko }}
                                        </h5>
                                        <p class="card-text">
                                            Total Transaksi: {{ $store->total_transactions }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endcan
            @can('isAdmin')
                <div class="col-md-4">
                    <a href="/admin/produk" class="text-decoration-none">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="fas fa-box"></i> Produk
                                </h5>
                                <p class="card-text">Tambah, kelola, dan update produk toko Anda.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="container mt-4">
                    <h3>Transaksi Anda</h3>
                    <div class="row">
                        <!-- Card Success -->
                        <div class="col-md-4">
                            <div class="card text-white bg-success mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <i class="fas fa-check-circle"></i> Transaksi Sukses
                                    </h5>
                                    <p class="card-text">
                                        {{ $data['success'] }} transaksi
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Card Pending -->
                        <div class="col-md-4">
                            <div class="card text-white bg-warning mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <i class="fas fa-hourglass-half"></i> Transaksi Pending
                                    </h5>
                                    <p class="card-text">
                                        {{ $data['pending'] }} transaksi
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Card Failed -->
                        <div class="col-md-4">
                            <div class="card text-white bg-danger mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <i class="fas fa-times-circle"></i> Transaksi Gagal
                                    </h5>
                                    <p class="card-text">
                                        {{ $data['failed'] }} transaksi
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('transactionChart').getContext('2d');
            const transactionChart = new Chart(ctx, {
                type: 'doughnut', // Pilih jenis chart (doughnut, bar, line, dll)
                data: {
                    labels: ['Success', 'Pending', 'Failed'],
                    datasets: [{
                        label: 'Transaksi',
                        data: [{{ $data['success'] }}, {{ $data['pending'] }},
                            {{ $data['failed'] }}],
                        backgroundColor: ['#4CAF50', '#FFC107', '#F44336'], // Warna chart
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                    }
                }
            });
        });
    </script> --}}
@endsection

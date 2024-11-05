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
            @endcan
        </div>

    </div>
@endsection

@extends('layout.navbar')

@section('title')
    <title>Rental Kostum | Kostum</title>
@endsection

@section('body')
    <section id="event">
        <div class="container-fluid event py-3 my-6">
            <div class="container">
                <div class="text-center wow bounceInUp">
                    <h1 class="pt-5 mb-5">Silahkan Pilih Kostum Yang Anda Inginkan</h1>
                </div>
                <div class="tab-class text-center">
                    <ul class="nav nav-pills d-inline-flex justify-content-center mb-5 wow bounceInUp">
                        <li class="nav-item p-2">
                            <a class="d-flex mx-2 py-2 border border-primary bg-light rounded-pill active text-decoration-none"
                                data-bs-toggle="pill" href="#tab-1">
                                <span class="text-dark" style="width: 150px;">Semua Toko</span>
                            </a>
                        </li>
                        <li class="nav-item p-2">
                            <a class="d-flex py-2 mx-2 border border-primary bg-light rounded-pill text-decoration-none"
                                data-bs-toggle="pill" href="#tab-2">
                                <span class="text-dark" style="width: 150px;">Turu Rental</span>
                            </a>
                        </li>
                        <li class="nav-item p-2">
                            <a class="d-flex mx-2 py-2 border border-primary bg-light rounded-pill text-decoration-none"
                                data-bs-toggle="pill" href="#tab-3">
                                <span class="text-dark" style="width: 150px;">Makassar Rental</span>
                            </a>
                        </li>
                        <li class="nav-item p-2">
                            <a class="d-flex mx-2 py-2 border border-primary bg-light rounded-pill text-decoration-none"
                                data-bs-toggle="pill" href="#tab-4">
                                <span class="text-dark" style="width: 150px;">Nurul Rental</span>
                            </a>
                        </li>
                        <li class="nav-item p-2">
                            <a class="d-flex mx-2 py-2 border border-primary bg-light rounded-pill text-decoration-none"
                                data-bs-toggle="pill" href="#tab-5">
                                <span class="text-dark" style="width: 150px;">Cosplay Rental</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                        <div class="col-sm-12 col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s">
                                            <a href="" class="text-decoration-none">
                                                <div class="card text-center" style="width: 18rem;">
                                                    <img src="img/anime1.jpg" class="card-img-top" alt="Kostum">
                                                    <div class="card-body m-0 p-0">
                                                        <p class="card-text bold">kostum Raiden Shogun</p>
                                                        <p class="card-text">Rp. 100.000
                                                        </p>
                                                        <p class="card-footer bg-success bold sewa text-white">
                                                            <i class="fas fa-shopping-cart"></i> Ready
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.3s">
                                            <a href="" class="text-decoration-none">
                                                <div class="card text-center" style="width: 18rem;">
                                                    <img src="img/anime1.jpg" class="card-img-top" alt="Kostum">
                                                    <div class="card-body m-0 p-0">
                                                        <p class="card-text bold">kostum Raiden Shogun</p>
                                                        <p class="card-text">Rp. 100.000
                                                        </p>
                                                        <p class="card-footer bg-success bold sewa text-white">
                                                            <i class="fas fa-shopping-cart"></i> Ready
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.5s">
                                            <a href="" class="text-decoration-none">
                                                <div class="card text-center" style="width: 18rem;">
                                                    <img src="img/anime1.jpg" class="card-img-top" alt="Kostum">
                                                    <div class="card-body m-0 p-0">
                                                        <p class="card-text bold">kostum Raiden Shogun</p>
                                                        <p class="card-text">Rp. 100.000
                                                        </p>
                                                        <p class="card-footer bg-success bold sewa text-white">
                                                            <i class="fas fa-shopping-cart"></i> Ready
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.7s">
                                            <a href="" class="text-decoration-none">
                                                <div class="card text-center" style="width: 18rem;">
                                                    <img src="img/anime1.jpg" class="card-img-top" alt="Kostum">
                                                    <div class="card-body m-0 p-0">
                                                        <p class="card-text bold">kostum Raiden Shogun</p>
                                                        <p class="card-text">Rp. 100.000
                                                        </p>
                                                        <p class="card-footer bg-success bold sewa text-white">
                                                            <i class="fas fa-shopping-cart"></i> Ready
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s">
                                            <a href="" class="text-decoration-none">
                                                <div class="card text-center" style="width: 18rem;">
                                                    <img src="img/anime1.jpg" class="card-img-top" alt="Kostum">
                                                    <div class="card-body m-0 p-0">
                                                        <p class="card-text bold">kostum Raiden Shogun</p>
                                                        <p class="card-text">Rp. 100.000
                                                        </p>
                                                        <p class="card-footer bg-success bold sewa text-white">
                                                            <i class="fas fa-shopping-cart"></i> Ready
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.3s">
                                            <a href="" class="text-decoration-none">
                                                <div class="card text-center" style="width: 18rem;">
                                                    <img src="img/anime1.jpg" class="card-img-top" alt="Kostum">
                                                    <div class="card-body m-0 p-0">
                                                        <p class="card-text bold">kostum Raiden Shogun</p>
                                                        <p class="card-text">Rp. 100.000
                                                        </p>
                                                        <p class="card-footer bg-success bold sewa text-white">
                                                            <i class="fas fa-shopping-cart"></i> Ready
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.5s">
                                            <a href="" class="text-decoration-none">
                                                <div class="card text-center" style="width: 18rem;">
                                                    <img src="img/anime1.jpg" class="card-img-top" alt="Kostum">
                                                    <div class="card-body m-0 p-0">
                                                        <p class="card-text bold">kostum Raiden Shogun</p>
                                                        <p class="card-text">Rp. 100.000
                                                        </p>
                                                        <p class="card-footer bg-success bold sewa text-white">
                                                            <i class="fas fa-shopping-cart"></i> Ready
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.7s">
                                            <a href="" class="text-decoration-none">
                                                <div class="card text-center" style="width: 18rem;">
                                                    <img src="img/anime1.jpg" class="card-img-top" alt="Kostum">
                                                    <div class="card-body m-0 p-0">
                                                        <p class="card-text bold">kostum Raiden Shogun</p>
                                                        <p class="card-text">Rp. 100.000
                                                        </p>
                                                        <p class="card-footer bg-success bold sewa text-white">
                                                            <i class="fas fa-shopping-cart"></i> Ready
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <a href="" class="text-decoration-none">
                                                <div class="card text-center" style="width: 18rem;">
                                                    <img src="img/anime1.jpg" class="card-img-top" alt="Kostum">
                                                    <div class="card-body m-0 p-0">
                                                        <p class="card-text bold">kostum Raiden Shogun</p>
                                                        <p class="card-text">Rp. 100.000
                                                        </p>
                                                        <p class="card-footer bg-success bold sewa text-white">
                                                            <i class="fas fa-shopping-cart"></i> Ready
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <a href="" class="text-decoration-none">
                                                <div class="card text-center" style="width: 18rem;">
                                                    <img src="img/anime1.jpg" class="card-img-top" alt="Kostum">
                                                    <div class="card-body m-0 p-0">
                                                        <p class="card-text bold">kostum Raiden Shogun</p>
                                                        <p class="card-text">Rp. 100.000
                                                        </p>
                                                        <p class="card-footer bg-success bold sewa text-white">
                                                            <i class="fas fa-shopping-cart"></i> Ready
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <a href="" class="text-decoration-none">
                                                <div class="card text-center" style="width: 18rem;">
                                                    <img src="img/anime1.jpg" class="card-img-top" alt="Kostum">
                                                    <div class="card-body m-0 p-0">
                                                        <p class="card-text bold">kostum Raiden Shogun</p>
                                                        <p class="card-text">Rp. 100.000
                                                        </p>
                                                        <p class="card-footer bg-success bold sewa text-white">
                                                            <i class="fas fa-shopping-cart"></i> Ready
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <a href="" class="text-decoration-none">
                                                <div class="card text-center" style="width: 18rem;">
                                                    <img src="img/anime1.jpg" class="card-img-top" alt="Kostum">
                                                    <div class="card-body m-0 p-0">
                                                        <p class="card-text bold">kostum Raiden Shogun</p>
                                                        <p class="card-text">Rp. 100.000
                                                        </p>
                                                        <p class="card-footer bg-success bold sewa text-white">
                                                            <i class="fas fa-shopping-cart"></i> Ready
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-4" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <a href="" class="text-decoration-none">
                                                <div class="card text-center" style="width: 18rem;">
                                                    <img src="img/anime1.jpg" class="card-img-top" alt="Kostum">
                                                    <div class="card-body m-0 p-0">
                                                        <p class="card-text bold">kostum Raiden Shogun</p>
                                                        <p class="card-text">Rp. 100.000
                                                        </p>
                                                        <p class="card-footer bg-success bold sewa text-white">
                                                            <i class="fas fa-shopping-cart"></i> Ready
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <a href="" class="text-decoration-none">
                                                <div class="card text-center" style="width: 18rem;">
                                                    <img src="img/anime1.jpg" class="card-img-top" alt="Kostum">
                                                    <div class="card-body m-0 p-0">
                                                        <p class="card-text bold">kostum Raiden Shogun</p>
                                                        <p class="card-text">Rp. 100.000
                                                        </p>
                                                        <p class="card-footer bg-success bold sewa text-white">
                                                            <i class="fas fa-shopping-cart"></i> Ready
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-5" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <a href="" class="text-decoration-none">
                                                <div class="card text-center" style="width: 18rem;">
                                                    <img src="img/anime1.jpg" class="card-img-top" alt="Kostum">
                                                    <div class="card-body m-0 p-0">
                                                        <p class="card-text bold">kostum Raiden Shogun</p>
                                                        <p class="card-text">Rp. 100.000
                                                        </p>
                                                        <p class="card-footer bg-success bold sewa text-white">
                                                            <i class="fas fa-shopping-cart"></i> Ready
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <a href="" class="text-decoration-none">
                                                <div class="card text-center" style="width: 18rem;">
                                                    <img src="img/anime1.jpg" class="card-img-top" alt="Kostum">
                                                    <div class="card-body m-0 p-0">
                                                        <p class="card-text bold">kostum Raiden Shogun</p>
                                                        <p class="card-text">Rp. 100.000
                                                        </p>
                                                        <p class="card-footer bg-success bold sewa text-white">
                                                            <i class="fas fa-shopping-cart"></i> Ready
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layout.navbar')

@section('title')
    <title>Rental Kostum | Home</title>
@endsection

@section('body')
    <div id="carouselExampleAutoplaying" class="carousel slide carousel-fade pb-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/anime3.jpg" class="d-block img-fluid w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/anime1.jpg" class="d-block img-fluid w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/anime2.jpg" class="d-block img-fluid w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="row m-0 p-0 pt-md-5 pb-5">
        <div class="col-12 col-md-6 m-0 p-0 pb-4 pb-md-0" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
            <img src="img/anime4.jpg" alt="" class="d-block img-fluid float-end float-md-end float-none">
        </div>
        <div class="col-12 col-md-6 d-flex justify-content-start justify-content-md-center align-items-center m-0 p-0"
            data-aos="fade-down" data-aos-anchor-placement="center-bottom">
            <div class="m-0 p-0 ms-3 ms-md-0">
                <h1 class="jas text-bold m-0 p-0 text-center text-md-start">Kostum Karakter Anime</h1>
                <p class="jas1 m-0 p-0 pt-2 text-rounded text-md-start">Kostum anime adalah pakaian yang dirancang untuk
                    menyerupai<br>
                    karakter-karakter
                    dalam anime, manga, atau game Jepang. Kostum<br> ini sering digunakan oleh para penggemar dalam kegiatan
                    cosplay<br> (costume play), di mana mereka berdandan dan berperan sebagai<br> karakter favorit mereka.
                    Kostum
                    anime mencakup berbagai elemen<br> seperti pakaian, aksesori, wig, dan makeup yang menyerupai
                    penampilan<br>
                    asli karakter tersebut, mulai dari seragam sekolah, baju tempur, hingga<br> pakaian fantasi yang
                    kompleks.
                </p>
            </div>
        </div>
    </div>
    <div class="row m-0 p-0 pt-3 pt-md-5 pb-5">
        <div class="col-12 col-md-6 d-flex justify-content-end justify-content-md-center align-items-center m-0 p-0 pb-4 pb-md-0"
            data-aos="fade-up" data-aos-anchor-placement="center-bottom">
            <div class="m-0 p-0 ms-3 ms-md-0">
                <h1 class="jas text-bold m-0 p-0 text-center text-md-end">Apa Itu Cosplayer?</h1>
                <p class="jas1 m-0 p-0 pt-2 text-rounded text-md-end">Cosplayer adalah seseorang yang mengenakan kostum
                    dan berperan sebagai<br>
                    karakter
                    dari anime, manga, game, film, atau seri televisi, terutama dari budaya<br> pop Jepang. Kata "cosplay"
                    berasal dari gabungan kata "costume" dan "play,"<br> yang mengindikasikan bahwa cosplayer tidak hanya
                    mengenakan kostum, tetapi<br> juga mencoba menirukan penampilan, gerak-gerik, dan perilaku karakter
                    yang<br>
                    mereka perankan.</p>
            </div>
        </div>
        <div class="col-12 col-md-6 p-0" data-aos="fade-down" data-aos-anchor-placement="center-bottom">
            <img src="img/anime5.jpg" alt="" class="baju2 rounded float-start">
        </div>
    </div>
@endsection

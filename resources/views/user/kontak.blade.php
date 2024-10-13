@extends('layout.navbar')

@section('title')
    <title>Rental Kostum | Kontak</title>
@endsection

@section('body')
    @if (Session::has('success'))
        <div class="swal" data-swal="{{ Session('success') }}"></div>
    @endif

    <div class="container">
        <h1 class="text-center pt-3 mb-4">Kontak Kami</h1>
        <p class="text-center mb-5">Jika Anda memiliki pertanyaan atau membutuhkan informasi lebih lanjut, jangan ragu
            untuk
            menghubungi kami melalui salah satu metode di bawah ini.</p>

        <div class="row">
            <div class="col-md-6">
                <h3>Informasi Kontak</h3>
                <ul class="list-unstyled">
                    <li><strong>Alamat:</strong> Jl. Sakura No.123, Makassar, Sulawesi Selatan</li>
                    <li><strong>Telepon:</strong> +62 812-3456-7890</li>
                    <li><strong>Email:</strong> rentalkostum@gmail.com</li>
                    <li><strong>Jam Operasional:</strong> Senin - Sabtu, 09:00 - 17:00</li>
                </ul>

                <h3 class="mt-4">Media Sosial</h3>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="https://mail.google.com/mail/u/0/?hl=en#inbox?compose=jrjtXLCCJZBLSWbdPsTgpgcZfTwqJbdrCmZsKLBNBnsjNVCTLDjffDmgWcSSnzTmvRzpmXvf"
                            class="btn btn-outline-dark me-2" target="_blank"><i class="fas fa-envelope"></i> Email</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://wa.me/6282346936681?text=Halo,%20saya%20mau%20bertanya"
                            class="btn btn-outline-dark" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-6">
                <h3>Kirim Pesan</h3>
                <form action="{{ url('/kontak') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="pesan" class="form-label">Pesan</label>
                        <textarea class="form-control" id="pesan" name="pesan" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

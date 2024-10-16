@extends('layout.navbar')

@section('title')
    <title>Rental Kostum | Syarat</title>
@endsection

@section('body')
    <div class="container pt-3">
        <h2 class="text-center pt-5 mb-4">Syarat dan Ketentuan Penyewaan</h2>
        <ol class="terms-list">
            <li>Penyewa harus berusia minimal 18 tahun dan memiliki KTP sebagai bukti identitas.</li>
            <li>Penyewa diwajibkan mengisi formulir sewa yang telah disediakan.</li>
            <li>Biaya sewa dan deposit harus dilunasi sebelum pengambilan kostum.</li>
            <li>Durasi sewa kostum adalah selama 3 hari (termasuk hari pengambilan dan pengembalian).</li>
            <li>Penyewa dapat memperpanjang masa sewa dengan menghubungi kami setidaknya 1 hari sebelum masa sewa berakhir.
            </li>
            <li>Setiap perpanjangan masa sewa dikenakan biaya tambahan sebesar 10% dari biaya sewa per hari.</li>
            <li>Kostum dapat diambil di lokasi yang telah ditentukan atau dikirim melalui jasa kurir dengan biaya pengiriman
                ditanggung oleh penyewa.</li>
            <li>Pengembalian kostum harus dilakukan pada hari yang telah ditentukan. Jika terlambat, akan dikenakan denda
                keterlambatan sebesar 5% dari biaya sewa per hari keterlambatan.</li>
            <li>Kostum harus dikembalikan dalam kondisi yang sama seperti saat diterima, tanpa kerusakan atau kotoran.</li>
            <li>Penyewa wajib membayar deposit sebesar 50% dari harga sewa kostum. Deposit akan dikembalikan setelah kostum
                dikembalikan dalam kondisi baik.</li>
            <li>Jika terjadi kerusakan atau kehilangan pada kostum, biaya perbaikan atau penggantian akan dipotong dari
                deposit. Jika biaya kerusakan melebihi deposit, penyewa wajib membayar kekurangannya.</li>
            <li>Penyewa dapat membatalkan penyewaan kostum dengan syarat pemberitahuan dilakukan setidaknya 2 hari sebelum
                tanggal penyewaan.</li>
            <li>Pembatalan yang dilakukan di bawah 2 hari akan dikenakan biaya administrasi sebesar 25% dari total biaya
                sewa.</li>
            <li>Kostum yang disewa hanya boleh digunakan untuk keperluan pribadi, seperti cosplay atau acara tertentu.
                Penyewa dilarang menyewakan kembali kostum tersebut kepada pihak ketiga.</li>
            <li>Kami berhak menolak penyewaan jika penyewa tidak memenuhi syarat yang ditentukan atau diketahui pernah
                merusak kostum pada penyewaan sebelumnya.</li>
            </ul>
        </ol>
        <hr>
        <p class="text-center">Metode Pembayaran:</p>
        <div class="payment-info">
            <p><strong>Rekening Bank:</strong></p>
            <ul>
                <li>Bank Mandiri: 1234567890 a.n. Lilis</li>
                <li>BCA: 0987654321 a.n. Lilis</li>
            </ul>
            <p><strong>Dana:</strong> 1234567890</p>
        </div>
        <hr>
        <p class="text-center">Untuk informasi lebih lanjut, silakan hubungi kami:</p>
        <div class="text-center contact-info pb-5">
            <a href="https://mail.google.com/mail/u/0/?hl=en#inbox?compose=jrjtXLCCJZBLSWbdPsTgpgcZfTwqJbdrCmZsKLBNBnsjNVCTLDjffDmgWcSSnzTmvRzpmXvf"
                class="btn btn-outline-dark me-2" target="_blank"><i class="fas fa-envelope"></i> Email</a>
            <a href="https://wa.me/6282346936681?text=Halo,%20saya%20mau%20bertanya" class="btn btn-outline-dark"
                target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp</a>
        </div>
    </div>
@endsection

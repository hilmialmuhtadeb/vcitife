@extends('layouts.app')
@section('content')
  <div class="container-fluid mt-4">
    <h2 class="fw-800 text-center mb-4">Panduan Pemesanan</h2>
    <div class="row justify-content-center">

      <div class="col-lg-2">
        <div class="card shadow bg-vcitife-light mb-3 py-3 card-guide">
          <img src="/images/icons/guide/png/user.png" class="card-icon">
          <div class="card-body">
            <h5 class="card-title text-center">1. Akun</h5>
            <p class="card-text text-center"><b>Buat akun</b> pada menu daftar yang ada di navigasi atau <b>masuk</b> bila sudah memiliki akun.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-2">
        <div class="card shadow bg-vcitife-light mb-3 py-3 card-guide">
          <img src="/images/icons/guide/png/product.png" class="card-icon">
          <div class="card-body">
            <h5 class="card-title text-center">2. Pilih</h5>
            <p class="card-text text-center"><b>Pilih produk</b> yang sesuai dengan tema acara pada halaman produk dan <b>masukkan keranjang.</b></p>
          </div>
        </div>
      </div>

      <div class="col-lg-2">
        <div class="card shadow bg-vcitife-light mb-3 py-3 card-guide">
          <img src="/images/icons/guide/png/form.png" class="card-icon">
          <div class="card-body">
            <h5 class="card-title text-center">3. Lengkapi</h5>
            <p class="card-text text-center">Pada <b>halaman keranjang</b>, klik tombol isi detail dan <b>lengkapi data</b> dengan sesuai.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-2">
        <div class="card shadow bg-vcitife-light mb-3 py-3 card-guide">
          <img src="/images/icons/guide/png/money.png" class="card-icon">
          <div class="card-body">
            <h5 class="card-title text-center">4. Bayar</h5>
            <p class="card-text text-center">Pada halaman checkout terdapat panduan pembayaran dan <b>selesaikan dalam 24 jam</b>.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-2">
        <div class="card shadow bg-vcitife-light mb-3 py-3 card-guide">
          <img src="/images/icons/guide/png/complete.png" class="card-icon">
          <div class="card-body">
            <h5 class="card-title text-center">5. Selesai</h5>
            <p class="card-text text-center"><b>Pesanan anda</b> akan <b>diproses</b> jika pembayaran sudah di konfirmasi oleh admin.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
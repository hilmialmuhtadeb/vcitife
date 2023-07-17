@extends('layouts.app')

@section('content')
<div class="hero shadow-sm">
  <div class="row">
    <div class="col-md-6">
      <img src="/images/hero.png" width="80%">
    </div>
    <div class="d-flex col-md-6 align-items-center py-5">
      <div class="keterangan">
        <h1 class="text-vcitife-2">Solusi <b>sertifikat<br>terbaik</b> Anda</h1>
        <p>Kami memberi yang terbaik untuk anda, dari desain hingga kertas.</p>
        <a href="{{ route('products.index') }}" class="btn btn-vcitife bg-vcitife-middle rounded-pill">Pilih Desain</a>
      </div>
    </div>
  </div>
</div>

<section class="fitur py-5">
  <div class="container">
    
    <div class="row justify-content-center py-4">
      <div class="col-md-4">
        <h2 class="font-weight-bold text-vcitife-2">Cara memesan?</h2>
      </div>
      <div class="col-md-4 text-vcitife-2">
        <p>Pilih desain produk yang pas, kemudian isi formulir, lalu bayar dan tunggu sertifikat anda diproses.</p>
      </div>
    </div>
  
    <div class="row text-center py-4">
      <div class="col-md-4">
        <div class="card mb-3 py-3 shadow bg-vcitife-light">
          <img src="/images/icons/easy.png" class="card-icon">
          <div class="card-body">
            <h5 class="card-title">Mudah</h5>
            <p class="card-text">Hanya tiga langkah mudah dalam memesan sertifikat, pilih, isi formulir, dan selesai.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-3 py-3 shadow bg-vcitife-light">
          <img src="/images/icons/timer.png" class="card-icon">
          <div class="card-body">
            <h5 class="card-title">Cepat</h5>
            <p class="card-text">Sertifikat selesai dalam 24 jam setelah anda menyelesaikan pemesanan dan pembayaran.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-3 py-3 shadow bg-vcitife-light">
          <img src="/images/icons/flexible.png" class="card-icon">
          <div class="card-body">
            <h5 class="card-title">Fleksibel</h5>
            <p class="card-text font">Atur apapun yang anda suka, sesuaikan dengan tema acara dan pilih desain terbaik.</p>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</section>
@endsection
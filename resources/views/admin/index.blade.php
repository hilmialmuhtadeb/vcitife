@extends('admin.layouts.app')
@section('body')

<h2 class="text-center fw-800 mb-4">Hai, Admin!</h2>
    
<div class="row">

  <div class="col-md-4">
    <div class="card bg-vcitife-green shadow-lg">
      <div class="card-number text-vcitife-3">{{ $product }}</div>
      <div class="card-body">
        <h5 class="card-title text-center text-vcitife-3">Produk</h5>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card bg-vcitife-green shadow-lg">
      <div class="card-number text-vcitife-3">{{ $order }}</div>
      <div class="card-body">
        <h5 class="card-title text-center text-vcitife-3">Penjualan</h5>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card bg-vcitife-green shadow-lg">
      <div class="card-number text-vcitife-3">{{ $user }}</div>
      <div class="card-body">
        <h5 class="card-title text-center text-vcitife-3">Pelanggan</h5>
      </div>
    </div>
  </div>

</div>
@endsection
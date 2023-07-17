@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produk</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <img src="{{ $product->takeImage }}" class="img-fluid">
    </div>

    <div class="col-md-4">

      <small> 
        <a href="{{ route('categories.show', $product->category_id) }}" class="text-vcitife-4 btn-link">KATEGORI : {{ strtoupper($product->category->name) }}</a>
      </small>

      <h1>{{ $product->name }}</h1>
      <p><b>terjual</b> {{$product->count}} item</p>

      @if ($product->discount)
      <div class="harga">
        Rp <s>{{ number_format($product->price)}}</s> <span class="discount ml-2">Rp {{ number_format($product->discount)}}</span>
      </div>
      @else
      <div class="harga">
        <span class="price">Rp {{ number_format($product->price)}}</span>
      </div>
      @endif
      
      <div class="my-2 text-secondary">
        @if ($product->ratingCount > 0)
          <i class="fa fa-star orange" aria-hidden="true"></i> {{ $product->rating }} ({{ $product->ratingCount }} Penilaian)
        @else
          <p>Belum ada penilaian</p>
        @endif
      </div>

      <div>
        <h6 class="mb-2">Deskripsi</h6>
        <p>{!! nl2br($product->description) !!}</p>
      </div>

      <div>
        <form action="{{ route('carts.store') }}" method="post">
          @csrf
          <input type="hidden" name="product_id" value="{{ $product->id }}">
          <button type="submit" class="btn btn-vcitife bg-vcitife-middle rounded-pill btn-block">Masukkan keranjang</button>
        </form>
      </div>

    </div>
  </div>

</div>
@endsection
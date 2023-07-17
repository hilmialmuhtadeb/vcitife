@extends('layouts.app')
@section('content')
  <div class="container mt-4">
    <div class="row align-items-center">
      <div class="col">
        @if(isset($category))
        <h4 class="text-center">Kategori Produk : <span class="fw-800">{{ $category->name }}</span></h4>
        @else
        <h2 class="text-center fw-800">Semua Produk</h2>
        @endif
      </div>
    </div>

    <div class="row mt-4">
      @forelse ($products as $product)
      <div class="col-md-3 mb-5">
        <div class="card border-0 shadow">
          <a href="{{ route('products.show', $product->slug) }}">
            <img src="{{ $product->takeImage }}" height="200px" class="card-img-top img-fluid">
          </a>
          <div class="card-body">
            <small>
              <a href="{{ route('categories.show', $product->category->id) }}" class="text-danger">{{ $product->category->name }}</a>
            </small>
            <h6 class="text-secondary card-title">{{ $product->name }}</h6>
            <h6>Rp {!! $product->discount ? '<s>' . number_format($product->price) . '</s>' . '<span class="discount-small ml-2">Rp ' . number_format($product->discount) . '</span>' : number_format($product->price) !!}</h6>
            <p class="d-inline">Terjual {{ $product->count }}</p>
            <div class="my-2 text-secondary">
              @if ($product->ratingCount > 0)
              <p><i class="fa fa-star orange" aria-hidden="true"></i> {{ $product->rating }} ({{ $product->ratingCount }} Penilaian)</p>
              @else
                <p>Belum ada penilaian</p>
              @endif
            </div>
          </div>
        </div>
      </div>
      @empty
        <div class="col">
          <div class="text-center alert alert-warning mt-3 text-vcitife-1" role="alert">
            Yah, Belum ada produk di toko ini
        </div>
      @endforelse
    </div>

    <div class="row justify-content-center">
      {{ $products->links() }}
    </div>
  </div>
@endsection
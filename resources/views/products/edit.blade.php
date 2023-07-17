@extends('layouts.app')
@section('content')
  <div class="container">

    <div class="row justify-content-center">
      <div class="col-md-8">
  
        <h1 class="mb-3">Ubah Informasi Produk</h1>
        <form method="POST" action="/products/{{ $product->slug }}/edit" enctype="multipart/form-data">
          @method('patch')
          @csrf
          @include('products.partials.form-control')
        </form>
  
      </div>
    </div>

  </div>
@endsection
@extends('layouts.app')
@section('content')
<div class="container">

  <div class="row justify-content-center">
    <div class="col-md-8">

      <h1 class="mb-3">Produk Baru</h1>
      <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        @include('products.partials.form-control', ['submit' => 'tambahkan'])
      </form>

    </div>
  </div>

</div>
@endsection
@extends('layouts.app')
@section('content')
  <div class="container mt-4">
    <h3 class="text-center fw-800">Keranjang Anda</h3>

    @if($details->count() == 0)
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <div class="alert alert-warning">
          Yah, Keranjangmu lagi kosong, cari produk <a href="{{ route('products.index') }}">disini</a> yuk..
        </div>
      </div>
    </div>

    @else
    <table class="table table-striped mt-4">
      <thead>
        <tr>
          <th scope="col" class="text-center">Gambar</th>
          <th scope="col" class="text-center">Produk</th>
          <th scope="col" class="text-center">Aksi</th>
          <th scope="col" class="text-center">Total</th>
        </tr>
      </thead>

      <tbody>   
        @foreach ($details as $detail)
        <tr>
          <td scope="row" class="text-center"><img src="{{ $detail->product->takeImage }}" height="100px"></td>
          <td class="align-middle text-center">{{ $detail->product->name }}</td>
          <td class="align-middle text-center">
            <form action="{{ route('details.destroy', $detail->id) }}" method="POST">
              @csrf
              @method('delete')
              <a href="{{ route('details.index', $detail->id) }}" class="btn bg-vcitife-middle text-white btn-sm">isi detail</a>
              <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
            </form>
          </td>
          <td class="align-middle text-center">Rp {{ number_format($detail->amount)}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="row justify-content-end">
      <div class="col-md-6">
        <h4 class="my-4">Total Keranjang</h4>

        <form action="{{ route('carts.update', $order->id) }}" method="post">
          @csrf
          @method('patch')
          <input type="hidden" name="subtotal" value="{{ $subtotal }}">
          <input type="hidden" name="summary" value="{{ $summary }}">
          
          <table class="table">
            <tbody>
              <tr>
                <th scope="row" class="table-active">Subtotal</th>
                <td class="text-center"><input type="text" value="Rp {{ number_format($subtotal)}}" readonly></td>
              </tr>
              <tr>
                <th scope="row" class="table-active">Kode Unik</th>
                <td class="text-center"><input type="text" value="Rp {{ number_format($order->unique_number)}}" readonly></td>
              </tr>
              <tr>
                <th scope="row" class="table-active">TOTAL</th>
                <td class="text-center"><input type="text" value="Rp {{ number_format($summary)}}" readonly></td>
              </tr>
            </tbody>
          </table>
          <button type="submit" class="text-center btn btn-dark btn-block">CHECKOUT</button>
        </form>

      </div>
    </div>
    @endif

  </div>
@endsection
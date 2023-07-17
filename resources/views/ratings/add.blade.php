@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row justify-content-center mt-3">
      <h2 class="text-center">Beri <span class="fw-800">Penilaian</span></h2>
    </div>
    @foreach ($details as $detail)
    <div class="row justify-content-center mb-3">
        <p class="text-center">Kode Pesanan : {{ $detail->order->order_number }}</p>
      </div>
      <table class="table mt-3">

        <thead>
          <tr>
            <th scope="col" class="text-center" style="width: 20%">Gambar Produk</th>
            <th scope="col" class="text-center" style="width: 10%">Kuantitas</th>
            <th scope="col" class="text-center" style="width: 15%">Nominal</th>
            <th scope="col" class="text-center" style="width: 40%">Rating</th>
            <th scope="col" class="text-center" style="width: 10%">Aksi</th>
          </tr>
        </thead>

        <tbody>
        <tr>
          <td scope="row" class="text-center align-middle">
            <img src="{{ $detail->product->takeImage }}" width="200px">
          </td>
          <td class="text-center align-middle">{{ $detail->quantity }}</td>
          <td class="text-center align-middle">Rp. {{ number_format($detail->amount) }}</td>
          <td class="align-middle">
            <div class="rating text-center">
              <i class="rating__star fa fa-star" data-value="1"></i>
              <i class="rating__star fa fa-star" data-value="2"></i>
              <i class="rating__star fa fa-star" data-value="3"></i>
              <i class="rating__star fa fa-star" data-value="4"></i>
              <i class="rating__star fa fa-star" data-value="5"></i>
            </div>
          </td>
          <td class="text-center align-middle">
            <form action="{{ route('ratings.store') }}" method="post">
              @csrf
              <input type="hidden" name="rating" id="ratingValue">
              <input type="hidden" name="detail_id" value="{{ $detail->id }}">
              <button type="submit" id="ratingSubmitButton" class="btn btn-primary btn-sm">Kirim nilai</button>
            </form>
          </td>
        </tr>
        </tbody>

      </table>
    @endforeach

    <div class="d-flex justify-content-center">
      {{ $details->links() }}
    </div>
  </div>
@endsection
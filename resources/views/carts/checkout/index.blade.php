@extends('layouts.app')
@section('content')
  <div class="container mt-4">
    <h2 class="text-center mb-4 fw-800">Checkout</h2>

    <div class="row">
      <div class="col-md-8">

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col" class="text-center" style="width: 30%">Gambar</th>
              <th scope="col" class="text-center">Detail</th>
            </tr>
          </thead>
    
          <tbody>   
            @foreach ($order->details()->get() as $detail)
            <tr>
              <td scope="row" class="text-center"><img src="{{ $detail->product->takeImage }}" width="100%"></td>
              <td class="align-middle">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item bg-transparent">{{ $detail->name }}</li>
                  <li class="list-group-item bg-transparent">{{ $detail->organizer }}</li>
                  <li class="list-group-item bg-transparent">{{ date_format(date_create($detail->date), 'd F, Y') }}</li>
                  <li class="list-group-item bg-transparent">{{ $detail->destination }}</li>
                  <li class="list-group-item bg-transparent"><p>catatan : {{ $detail->notes ?? 'tidak ada' }}</p></li>
                </ul>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div>

      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Rincian Pembayaran</h5>
            <table style="width: 100%" cellpadding="5em">
              <tbody>
                <tr>
                  <th scope="row">Subtotal</th>
                  <td>Rp {{ number_format($order->subtotal)}}</td>
                </tr>
                <tr>
                  <th scope="row">Kode Unik</th>
                  <td>Rp {{ number_format($order->unique_number)}}</td>
                </tr>
                <tr class="border-top">
                  <th scope="row">TOTAL</th>
                  <td class="font-weight-bold">Rp {{ number_format($order->summary)}}</td>
                </tr>
              </tbody>
            </table>
            <form action="{{ route('carts.new') }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-dark btn-block mt-2">BAYAR</button>
            </form>

            <h5 class="card-title mt-4">Cara Pembayaran</h5>
            <ol>
              <li>
                <p>
                  Bayar sejumlah total pembayaran ke:
                  <ul class="pl-3">
                    <li><p><b>Bank BRI</b> 113701001062532 <br><b>(ALIFIA OCTAVIANY BASHIR)</b></p></li>
                    <li><p><b>OVO & DANA</b> 085337163575 <br><b>(ALIFIA OCTAVIANY BASHIR)</b></p></li>
                  </ul>
                </p>
              </li>
              <li><p>Batas waktu pembayaran adalah <b>24 jam</b> setelah anda menekan tombol bayar.</p></li>
              <li><p>Admin akan mengecek pembayaran anda maksimal 2 hari kerja setelah anda melakukan pembayaran.</p></li>
              <li><p>Jika pembayaran anda terverifikasi maka pesanan akan segera kami proses.</p></li>
            </ol>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
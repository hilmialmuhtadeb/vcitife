@extends('admin.layouts.app')
@section('body')
  <div class="row">
    <div class="col">
      <h3 class="text-center">List Pesanan : <span class="fw-800">Semua Pesanan</span></h3>
    </div>
  </div>

  @if ($orders->count() == 0)
  <div class="text-center text-danger mt-4">
    Belum ada pesanan sama sekali.
  </div>

  @else
  <table class="table mt-3">
    <thead>
      <tr>
        <th scope="col" class="text-center">Kode Pesanan</th>
        <th scope="col" class="text-center">Nomor Unik</th>
        <th scope="col">Pemesan</th>
        <th scope="col">Nominal</th>
        <th scope="col" class="text-center">Status Pesanan</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($orders as $order)
        <tr>
          <td scope="row" class="text-center align-middle">{{$order->order_number }}</td>
          <td class="text-center align-middle">{{ $order->unique_number }}</td>
          <td class="align-middle">{{ $order->user->name }}</td>
          <td class="align-middle">Rp. {{ number_format($order->summary) }}</td>
          <td class="text-center align-middle">
            @if ($order->status == 0)
              <div><button class="btn btn-danger disabled btn-sm">Menunggu pembayaran</button></div>
            @elseif ($order->status == 1)
              <div><button class="btn btn-warning disabled btn-sm">Menunggu dikirimkan</button></div>
            @else
              <div><button class="btn btn-success disabled btn-sm">Selesai</button></div>
            @endif
          </td>
        </tr>
      @endforeach

    </tbody>
  </table>

  <div class="row justify-content-md-center">
    {{ $orders->links() }}
  </div>

  @endif
@endsection
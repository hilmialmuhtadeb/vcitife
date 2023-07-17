@extends('layouts.app')
@section('content')

  <div class="container mt-4">
    <h3 class="text-center"><span class="fw-800">Riwayat</span> Pemesanan Anda</h3>

    @if ($orders->count() == 0)
    <div class="text-center text-danger mt-4">
      Belum ada pesanan sama sekali.
    </div>

    @else
    <table class="table mt-3">
      <thead>
        <tr>
          <th scope="col" class="text-center">Kode Pesanan</th>
          <th scope="col" class="text-center">Tanggal Pemesanan</th>
          <th scope="col">Pemesan</th>
          <th scope="col">Nominal</th>
          <th scope="col" class="text-center">Status Pesanan</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($orders as $order)
          <tr>
            <td scope="row" class="text-center align-middle">{{$order->order_number }}</td>
            <td class="text-center align-middle">{{ date_format(date_create($order->created_at), 'H.i - d F, Y') }}</td>
            <td class="align-middle">{{ $order->user->name }}</td>
            <td class="align-middle">Rp. {{ number_format($order->summary) }}</td>
            <td class="text-center align-middle">
              @if ($order->status == 0)
                <div><button class="btn btn-danger disabled btn-sm">Menunggu pembayaran</button></div>
              @elseif ($order->status == 1)
                <div><button class="btn btn-warning disabled btn-sm">Sedang diproses</button></div>
              @elseif ($order->status == 2)
                <div>
                  <a href="{{ route('ratings.add', $order->id) }}" class="btn btn-secondary btn-sm">
                    Beri penilaian
                  </a>
                </div>
              @else
                <div><button class="btn btn-success disabled btn-sm">Selesai</button></div>
              @endif
            </td>
          </tr>
        @endforeach

      </tbody>
    </table>

    {{ $orders->links() }}
    @endif
  </div>

@endsection
@extends('admin.layouts.app')
@section('body')
  <div class="row">
    <div class="col">
      <h3 class="text-center">List Pesanan : <span class="fw-800">Pesanan Baru</span></h3>
    </div>
  </div>

  @if ($orders->count() == 0)
  <div class="text-center text-danger mt-4">
    Belum ada pesanan masuk.
  </div>

  @else
  <table class="table mt-3">
    <thead>
      <tr>
        <th scope="col" class="text-center">Kode Pesanan</th>
        <th scope="col" class="text-center">Nomor Unik</th>
        <th scope="col">Pemesan</th>
        <th scope="col">Nominal</th>
        <th scope="col" class="text-center">Aksi</th>
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
            <form action="{{ route('admin.orders.update', $order->id) }}" method="post">
              @csrf
              @method('patch')
              <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-check" aria-hidden="true"></i> <p class="d-inline">tandai dibayar</p></button>
              <a href="{{ route('admin.orders.detail', $order->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-info-circle" aria-hidden="true"></i> <p class="d-inline">info</p></a>
            </form>
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
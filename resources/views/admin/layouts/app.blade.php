@extends('layouts.app')
@section('content')
    <div class="container mt-4">
      <div class="row">

        <div class="col-md-3 mb-4">
          <ul class="list-group">
            <li class="list-group-item"><a href="{{ route('admin.index') }}" class="btn btn-link text-dark">Dashboard</a></li>
            <li class="list-group-item"><a href="{{ route('admin.products') }}" class="btn btn-link text-dark">Kelola Produk</a></li>
            <li class="list-group-item">
              <div class="dropdown">
                <button class="btn btn-transparent dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Kelola Pesanan
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{ route('admin.orders') }}">Pesanan Baru</a>
                  <a class="dropdown-item" href="{{ route('admin.orders.wait') }}">Perlu Dikirim</a>
                  <a class="dropdown-item" href="{{ route('admin.orders.all') }}">Semua Pesanan</a>
                </div>
              </div>
            </li>
            <li class="list-group-item"><a href="{{ route('admin.users.index') }}" class="btn btn-link text-dark">Lihat Pengguna</a></li>
          </ul>
        </div>

        <div class="col-md-9">
          @yield('body')
        </div>

      </div>
    </div>
@endsection
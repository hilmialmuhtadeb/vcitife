@extends('admin.layouts.app')
@section('body')
    <div class="row">
      <div class="col-md-8">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.orders') }}">Kelola Pesanan</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $order->order_number }}</li>
          </ol>
        </nav>
      </div>
    </div>
    <h3>Kode Pesanan : {{ $order->order_number }}</h3>

    @php
        $i = 1;
    @endphp

      <table style="width: 100%" cellpadding="5em">
        <thead>
          <tr>
            <th class="text-center" style="width: 10%">No</th>
            <th style="width: 20%">Detail</th>
            <th style="width: 3%"></th>
            <th></th>
          </tr>
        </thead>

        <tbody>
        @foreach ($order->details as $detail)
          <tr class="border-top">
            <td class="text-center align-top" rowspan="12">{{ $i }}</td>
            <td>Produk</td>
            <td>:</td>
            <td>{{ $detail->product->name }}</td>
          </tr>
          <tr>
            <td>Nama Event</td>
            <td>:</td>
            <td>{{ $detail->name }}</td>
          </tr>
          <tr>
            <td>Logo</td>
            <td>:</td>
            <td><a href="{{ '/storage/' . $detail->logo }}" download="logo {{ $detail->name }}" class="btn btn-success btn-sm">download logo</a></td>
          </tr>
          <tr>
            <td>Penyelenggara</td>
            <td>:</td>
            <td>{{ $detail->organizer }}</td>
          </tr>
          <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td>{{ date_format(date_create($detail->date), 'd F, Y') }}</td>
          </tr>
          <tr>
            <td>Waktu</td>
            <td>:</td>
            <td>{{ $detail->time ?? '-' }}</td>
          </tr>
          <tr>
            <td>Lokasi</td>
            <td>:</td>
            <td>{{ $detail->location }}</td>
          </tr>
          <tr>
            <td>Jumlah</td>
            <td>:</td>
            <td>{{ $detail->quantity }}</td>
          </tr>
          <tr>
            <td class="align-top">Nama Peserta</td>
            <td class="align-top">:</td>
            <td>{!! $detail->participant_manual ? 
            nl2br($detail->participant_manual) : 
            '<a href="/storage/' . $detail->participant_auto . '" download="nama peserta ' . $detail->name . '" class="btn btn-success btn-sm">download file nama peserta</a>' !!}</td>
          </tr>
          <tr>
            <td>Format</td>
            <td>:</td>
            <td>{{ $detail->format }}</td>
          </tr>
          <tr>
            <td>Email Tujuan</td>
            <td>:</td>
            <td>{{ $detail->destination }}</td>
          </tr>
          <tr class="border-bottom">
            <td>Catatan</td>
            <td>:</td>
            <td class="text-danger"><i>{{ $detail->notes ?? 'tidak ada catatan' }}</i></td>
          </tr>

          @php
              $i++;
          @endphp
        @endforeach

        </tbody>
      </table>
@endsection
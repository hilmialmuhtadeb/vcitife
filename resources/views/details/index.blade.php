@extends('layouts.app')
@section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">

          <h3 class="text-center py-3">Detail Sertifikat</h3>
          <form action="{{ route('details.update', $detail->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            @include('details.partials.form-control')
          </form>

        </div>
      </div>
    </div>
@endsection
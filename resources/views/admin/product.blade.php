@extends('admin.layouts.app')
@section('body')
  <div class="row mb-3">
    <div class="col-md-12 text-center">
      <h2 class="fw-800">Produk Anda</h2>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 text-right">
      <a data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-vcitife bg-vcitife-green"><i class="fa fa-plus" aria-hidden="true"></i> Kategori</a>
      <a href="{{ route('products.new') }}" class="btn btn-sm btn-vcitife bg-vcitife-army"><i class="fa fa-plus" aria-hidden="true"></i> Produk</a>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <form action="{{ route('categories.store') }}" method="post">
          @csrf
          
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Masukkan nama kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="text" name="name" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn bg-vcitife-dark text-white">Tambahkan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  @if ($products->count() != 0)
  <table class="table mt-3">
    <thead>
      <tr>
        <th scope="col" style="width: 25%" class="text-center">Gambar</th>
        <th scope="col">Nama</th>
        <th scope="col" style="width: 25%" class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($products as $product)
        <tr>
          <th scope="row" class="text-center"><img src="{{ $product->takeImage }}" width="100px"></th>
          <td class="align-middle">{{ $product->name }}</td>
          <td class="text-center align-middle">
            <form action="{{ route('products.delete', $product->slug) }}" method="POST">
              @csrf
              @method('delete')
              <a href="{{ route('products.edit', $product->slug) }}" class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> edit</a>
              <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> hapus</button>
            </form>
          </td>
        </tr>
      @endforeach

    </tbody>
  </table>

  <div class="row justify-content-center">
    {{ $products->links() }}
  </div>
      
  @else
    <div class="text-vcitife-1 text-center mt-5">Belum ada produk nih, tambahkan yuk..</div>
  @endforelse

@endsection
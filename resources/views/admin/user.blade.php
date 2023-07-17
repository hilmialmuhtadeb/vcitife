@extends('admin.layouts.app')
@section('body')
  <div class="row">
    <div class="col-md-12 text-center">
      <h3><span class="fw-800">Pengguna</span> Situs Anda</h3>
    </div>
  </div>

  <table class="table mt-3">
    <thead>
      <tr>
        <th scope="col" style="width: 25%" class="text-center">Peran</th>
        <th scope="col">Nama</th>
        <th scope="col" style="width: 25%" class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($users as $user)
        <tr>
          <td scope="row" class="text-center">
            @if ($user->isAdmin == true)
                <div class="text-success">Admin</div>
            @else
                Pelanggan
            @endif
          </td>
          <td class="align-middle">{{ $user->name }}</td>
          <td class="text-center align-middle">
            @if ($user->isAdmin == true)
                <div class="btn btn-success btn-sm disabled">sudah menjadi admin</div>
            @else
                <form action="{{ route('admin.users.addAdmin', $user->id) }}" method="POST">
                  @csrf
                  @method('patch')
                  <button type="submit" class="btn btn-secondary btn-sm">jadikan admin</button>
                </form>
            @endif
          </td>
        </tr>
      @endforeach

    </tbody>
  </table>

  <div class="row justify-content-md-center">
    {{ $users->links() }}
  </div>

@endsection
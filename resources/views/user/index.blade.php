@extends('template.main')
@section('content')

<div class="container">
    <div class="row col-lg-12">
        <div class="col-lg-1">
        </div>
        <div class="col-lg-10 my-5">
            <div class="text-center">
                <h3>Daftar Users</h3>

                @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                @endif
            
            </div>
            <a class="btn btn-primary" href="/user/create">Tambah User</a>
            <table class="mt-3 table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                @foreach ($user as $item)
                    <tbody>
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->created_at }}</td>
                        @if ($item->id == Auth()->user()->id)
                             <td>Login saat ini</td>
                        @else 
                            <td>
                                <a class="btn btn-warning btn-sm" href="/user/{{ $item->id }}/edit">Edit</a>
                                <form class="d-inline" action="/user/{{ $item->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                    </tbody>
                @endforeach
              </table>
        </div>
        <div class="col-lg-1">
        </div>
    </div>
</div>
    
@endsection
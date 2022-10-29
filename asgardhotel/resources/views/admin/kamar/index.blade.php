@extends('adminlayouts.appadmin')

@section('title', 'Asgard Hotel | Kamar')

@section('content-header')

    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Kamar</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item active">Kamar</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->

@endsection

@section('content')

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
        Tambah Data
    </button>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tipe Kamar</th>
            <th scope="col">Jumlah Kamar</th>
            <th scope="col">Image</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($kamar as $k)

            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $k->tipe_kamar }}</td>
                <td>{{ $k->jumlah_kamar }}</td>
                <td>
                    <img src="/storage/{{ $k->image }}" width="100px" alt="">
                </td>
                <td>
                    <a href="/kamar/{{ $k->id }}/edit" class="btn btn-success">Edit</a>
                    <form action="/kamar/{{ $k->id }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kamar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">

                <form action="/kamar" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
                        <input type="text" class="form-control @error('tipe_kamar') is-invalid @enderror" id="tipe_kamar" name="tipe_kamar" placeholder="Tipe Kamar" value="{{ old('tipe_kamar') }}">
                        @error('tipe_kamar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_kamar" class="form-label">Jumlah Kamar</label>
                        <input type="text" class="form-control @error('jumlah_kamar') is-invalid @enderror" id="jumlah_kamar" name="jumlah_kamar" placeholder="Jumlah Kamar" value="{{ old('jumlah_kamar') }}">
                        @error('jumlah_kamar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image') }}">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
            </div>
        </div>
        </div>
    </div>

@endsection

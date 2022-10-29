@extends('adminlayouts.appadmin')

@section('title', 'Asgard Hotel | Edit Kamar')

@section('content-header')

    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Edit Kamar</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                <li class="breadcrumb-item active">Edit Kamar</li>
            </ol>
        </div>
    </div>

@endsection

@section('content')

    <form action="/kamar/{{ $kamar->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="hidden" name="image_lama" value="{{ $kamar->image }}">
        <div class="mb-3">
            <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
            <input type="text" name="tipe_kamar" id="tipe_kamar" class="form-control @error('tipe_kamar') is-invalid @enderror" placeholder="Tipe Kamar" value="{{ $kamar->tipe_kamar }}">
            @error('tipe_kamar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jumlah_kamar" class="form-label">Jumlah Kamar</label>
            <input type="text" name="jumlah_kamar" id="jumlah_kamar" class="form-control" placeholder="Jumlah Kamar" value="{{ $kamar->jumlah_kamar }}">
            @error('jumlah_kamar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button class="btn btn-success" type="submit">Edit</button>

    </form>

@endsection

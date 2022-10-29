@extends('adminlayouts.appadmin')

@section('title', 'Asgard Hotel | Edit Fasilitas Kamar')

@section('content-header')

    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Edit Fasilitas Kamar</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                <li class="breadcrumb-item active">Edit Fasilitas Kamar</li>
            </ol>
        </div>
    </div>

@endsection

@section('content')

    <form action="/fasilitas-kamar/{{ $fasilitas->id }}" method="post">
        @csrf
        @method('PUT')

        <input type="hidden" name="image_lama" value="{{ $fasilitas->image }}">
        <div class="modal-body">
            <form action="/fasilitas-kamar" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
                <select name="kamar_id" id="tipe_kamar" class="form-control @error('kamar_id') is-invalid @enderror">
                    <option selected value="{{ $fasilitas->kamar->id }}">{{ $fasilitas->kamar->tipe_kamar }}</option>
                    @foreach ($kamar as $k)
                    <option value="{{ $k->id }}">{{ $k->tipe_kamar }}</option>
                    @endforeach
                </select>
                @error('kamar_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="nama_fasilitas" class="form-label">Nama Fasilitas</label>
                    <input type="text" class="form-control @error('nama_fasilitas') is-invalid @enderror" id="nama_fasilitas" name="nama_fasilitas" placeholder="Nama Fasilitas" value="{{ $fasilitas->nama_fasilitas }}">
                    @error('nama_fasilitas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
        
                <button class="btn btn-success" type="submit">Edit</button>
            </form>
        </div>
    </form>

@endsection

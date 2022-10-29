@extends('userlayouts.appuser')
@section('title', 'Asgard Hotel | Pemesanan')

@section('content-header')

    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Pemesanan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Pemesanan</a></li>
            {{-- <li class="breadcrumb-item active">Kamar</li> --}}
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->

@endsection

@section('content')

    <form action="/pemesanan" method="post" class="my-4">
        @csrf
        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
        <div class="row">
            <div class="col">
                <label for="" class="form-label">Tanggal Check In</label>
                <input type="date" class="form-control @error('tanggal_cek_in') is-invalid @enderror" name="tanggal_cek_in" placeholder="Tanggal Check In" value="{{ old('tanggal_cek_in') }}">
                @error('tanggal_cek_in')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col">
                <label for="" class="form-label">Tanggal Check Out</label>
                <input type="date" class="form-control @error('tanggal_cek_out') is-invalid @enderror" name="tanggal_cek_out" placeholder="Tanggal Check Out" value="{{ old('tanggal_cek_out') }}">
                @error('tanggal_cek_out')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col">
                <label for="" class="form-label">Jumlah Kamar</label>
                <input type="text" class="form-control @error('jumlah_kamar') is-invalid @enderror" name="jumlah_kamar" value="{{ old('jumlah_kamar') }}">
                @error('jumlah_kamar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="mt-2">
            <label for="" class="form-label">Nama Pemesan</label>
            <input type="text" class="form-control @error('nama_pemesan') is-invalid @enderror" name="nama_pemesan" value="{{ old('nama_pemesan') }}">
            @error('nama_pemesan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mt-2">
            <label for="" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mt-2">
            <label for="" class="form-label">Nomor Handphone</label>
            <input type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{ old('no_telp') }}">
            @error('no_telp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mt-2">
            <label for="" class="form-label">Nama Tamu</label>
            <input type="text" class="form-control @error('nama_tamu') is-invalid @enderror" name="nama_tamu" value="{{ old('nama_tamu') }}">
            @error('nama_tamu')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mt-2">
            <label for="" class="form-label">Tipe Kamar</label>
            <select class="form-control @error('kamar_id') is-invalid @enderror" aria-label="Default select example" name="kamar_id">
                <option value="" selected>Pilih Tipe Kamar</option>
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

        <button type="submit" class="btn btn-success mt-4">Konfirmasi Pemesanan</button>
    </form>

@endsection

@extends('userlayouts.appuser')
@section('title', 'Asgard Hotel | Riwayat')

@section('content-header')

    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Riwayat Pemesanan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item active">Riwayat Pemesanan</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->

@endsection

@section('content')

<table id="dataTabel" class="table table-striped">
    <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Pemesan</th>
        <th scope="col">Tipe Kamar</th>
        <th scope="col">Tanggal Check In</th>
        <th scope="col">Tanggal Check Out</th>
        <th scope="col">Aksi</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($pemesanan as $p)

        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $p->nama_pemesan }}</td>
            <td>{{ $p->kamar->tipe_kamar }}</td>
            <td>{{ $p->tanggal_cek_in }}</td>
            <td>{{ $p->tanggal_cek_out }}</td>
            <td>
                <a href="/invoice/{{ $p->id }}" class="btn btn-info">Cetak Struk</a>
            </td>
            {{-- <td>
                <a href="/kamar/{{ $k->id }}/edit" class="btn btn-success">Edit</a>
                <form action="/kamar/{{ $k->id }}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td> --}}
        </tr>

        @endforeach
    </tbody>
</table>

@endsection

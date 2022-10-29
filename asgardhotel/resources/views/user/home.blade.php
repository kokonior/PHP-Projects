@extends('userlayouts.appuser')
@section('title', 'Asgard Hotel | Beranda')

@section('content-header')

    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Beranda</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            {{-- <li class="breadcrumb-item active">Kamar</li> --}}
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

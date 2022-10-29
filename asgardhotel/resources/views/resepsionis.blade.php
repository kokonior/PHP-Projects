<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Asgard Hotel | Resepsionis</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    </head>
    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
            @include('adminlayouts.navbar-resepsionis')
            <div class="content-wrapper">
                    <div class="content-header">
                        <div class="container-fluid">

                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0">Resepsionis</h1>
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                                        <li class="breadcrumb-item active">Resepsionis</li>
                                    </ol>
                                </div><!-- /.col -->
                            </div><!-- /.row -->

                        </div>
                    </div>


                    <section class="content">
                        <div class="container-fluid">

                            <table id="dataTabel" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Tamu</th>
                                        <th scope="col">Tanggal Check In</th>
                                        <th scope="col">Tanggal Check Out</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pemesanan as $p)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $p->nama_tamu }}</td>
                                            <td>{{ $p->tanggal_cek_in }}</td>
                                            <td>{{ $p->tanggal_cek_out }}</td>
                                            <td>
                                                <form action="/status/{{ $p->id }}" method="post">
                                                    @csrf
                                                    @if ($p->status === 'booking')
                                                        <input type="hidden" name="status" value="Check In">
                                                        <button type="submit" class="btn btn-primary">Check In</button>
                                                    @elseif ($p->status === 'Check In')
                                                        <input type="hidden" name="status" value="Check Out">
                                                        <button type="submit" class="btn btn-success">Check Out</button>
                                                    @endif

                                                </form>

                                                @if ($p->status === 'Check Out')
                                                    <span class="btn btn-info">Selesai</span>
                                                @endif

                                            </td>
                                        </tr>

                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </section>
                </div>
            </div>
        </div>
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
              <b>Version</b> 3.1.0
            </div>
          </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="/dist/js/adminlte.js"></script>

        <!-- PAGE /PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
        <script src="/plugins/raphael/raphael.min.js"></script>
        <script src="/plugins/jquery-mapael/jquery.mapael.min.js"></script>
        <script src="/plugins/jquery-mapael/maps/usa_states.min.js"></script>
        <!-- ChartJS -->
        <script src="/plugins/chart.js/Chart.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="/dist/js/pages/dashboard2.js"></script>

        <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="/plugins/dataTables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function(){
                $('#dataTabel').dataTable();
            });
        </script>
    </body>
</html>

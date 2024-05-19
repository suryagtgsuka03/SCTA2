{{-- 
    wireframe,
    bab 4
    --}}



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Monitoring</title>

    {{-- Style css --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE/dist/css/adminlte.min.css') }}">
    <!-- FeatherIcon -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<!--
body tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="body-mon hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Monitoring</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('actionlogout') }}" class="nav-link"><i data-feather="log-out"></i>LogOut</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Sidebar -->
            <a style="text-decoration: none" href="#" class="brand-link">
                <img src="{{ asset('asset/img/logo.png') }}" alt="CV Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">CV. Ary & Agha</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('css/AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a style="text-decoration: none" href="#" class="d-block">Admin</a>
                    </div>
                </div>
                <div class="sidebar">
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <li class="nav-item">
                                <a href="/dashboard" class="nav-link">
                                    <i class="nav-icon" data-feather="command"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item menu-open">
                                <a href="/monitor" class="nav-link active">
                                    <i class="nav-icon" data-feather="monitor"></i>
                                    <p>
                                        Monitoring
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/invoice" class="nav-link">
                                    <i class="nav-icon" data-feather="clipboard"></i>
                                    <p>
                                        Invoice
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/pembukuan" class="nav-link">
                                    <i class="nav-icon" data-feather="book-open"></i>
                                    <p>
                                        Pemasukan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/pengeluaran" class="nav-link">
                                    <i class="nav-icon" data-feather="book-open"></i>
                                    <p>
                                        Pengeluaran
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Monitoring</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="t_supir breadcrumb-item">
                                    <a style="text-decoration: none" href="#"
                                        data-bs-toggle="modal" data-bs-target="#form_supir"><i data-feather="plus"></i>
                                        Tambah Supir
                                    </a>
                                </li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- /.content-Modal -->
            <div class="modal fade" id="form_supir">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Supir</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        @if (session('Success'))
                            <div class="alert alert-success">
                                {{ session('Success') }}
                            </div>
                        @endif
                        @if ($errors->any())

                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>

                        @endif
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="modal-body">
                                <form id="supir" action="{{ route('monitor.post') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            value="{{ old('nama') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nomor_ktp" class="form-label">Nomor KTP</label>
                                        <input type="number" class="form-control" id="nomor_ktp" name="nomor_ktp"
                                            maxlength="16" value="{{ old('nomor_ktp') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggal_lahir"
                                            name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="umur" class="form-label">Umur</label>
                                        <input type="text" class="form-control" id="umur" name="umur"
                                            readonly value="{{ old('umur') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="plat_truk" class="form-label">Plat Truk</label>
                                        <input type="text" class="form-control" id="plat_truk" name="plat_truk"
                                            value="{{ old('plat_truk') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="asal" class="form-label">Asal</label>
                                        <input type="text" class="form-control" id="asal" name="asal"
                                            value="{{ old('asal') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="foto" class="form-label">Foto</label>
                                        <input type="file" class="form-control" id="foto" name="foto">
                                    </div>
                                    <div class="mb-3">
                                        <label for="foto_ktp" class="form-label">Foto KTP</label>
                                        <input type="file" class="form-control" id="foto_ktp" name="foto_ktp">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>

            
            <!-- Main content -->
            <div class="content content-mon">
                <div class="container-fluid">
                    <div class="row">
                        @foreach ($data as $item)
                            <div class="col-md-4">
                                <!-- Widget: user widget style 1 -->
                                <div class="card card-widget widget-user">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div class="widget-user-header bg-info">
                                        <h3 class="widget-user-username">{{ $item->nama }}</h3>
                                        <h5 class="widget-user-desc">{{ $item->p_truk }}</h5>
                                    </div>
                                    <div class="widget-user-image">
                                        <img src="{{ asset('storage/foto/' .$item->foto) }}"
                                            class="img-circle elevation-2" alt="User Image">
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-4 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header">{{ $item->t_lahir }}</h5>
                                                    <span class="description-text">Tanggal Lahir</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header">{{ $item->umur }}</h5>
                                                    <span class="description-text">Umur</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4">
                                                <div class="description-block">
                                                    <h5 class="description-header">{{ $item->asal }}</h5>
                                                    <span class="description-text">Asal</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 border-right">
                                                <div class="description-block">
                                                    <button type="button"
                                                        class="btn btn-block bg-gradient-primary btn-lg">Detail</button>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                                <div class="description-block">
                                                    <button type="button"
                                                        class="btn btn-block bg-gradient-info btn-lg">Edit</button>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


            


        </div>
    </div>

    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('css/AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('css/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('css/AdminLTE/dist/js/adminlte.js') }}"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('css/AdminLTE/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('css/AdminLTE/dist/js/pages/dashboard3.js') }}"></script>
    <script>
        feather.replace();
    </script>
    <script src="{{ asset('JS/script.js') }}"></script>
</body>

</html>

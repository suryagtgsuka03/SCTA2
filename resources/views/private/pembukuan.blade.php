<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pemasukan</title>

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

<body class="hold-transition sidebar-mini">
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
                    <a href="#" class="nav-link">Pemasukan</a>
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
                            <li class="nav-item">
                                <a href="/monitor" class="nav-link">
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
                            <li class="nav-item menu-open">
                                <a href="/pembukuan" class="nav-link active">
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
                            <h1 class="m-0">Pemasukan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Pemasukan</a></li>
                                <li class="breadcrumb-item active">Pemasukan</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header border-0">
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
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">Pemasukan</h3>
                                        <a style="text-decoration: none" href="#" data-bs-toggle="modal"
                                            data-bs-target="#pemasukan"><i data-feather="plus"></i>
                                            Tambah
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 15%">Tanggal</th>
                                                <th style="width: 15%">Jumlah</th>
                                                <th style="width: 15%">Sumber</th>
                                                <th style="width: 55%">Keterangan</th>
                                                <th style="width: 30px"></th>
                                                <th style="width: 30px"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_pemasukan as $pemasukan)
                                                <tr>
                                                    <td>{{ $pemasukan->tanggal }}</td>
                                                    <td>Rp. {{ $pemasukan->jumlah }}</td>
                                                    <td>{{ $pemasukan->sumber }}</td>
                                                    <td>{{ $pemasukan->keterangan }}</td>
                                                    <td>
                                                        <a href="#"
                                                            onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus item ini?')) { document.getElementById('delete-form-{{ $pemasukan->id }}').submit(); }">
                                                            <i data-feather="trash-2"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $pemasukan->id }}"
                                                            action="{{ route('pemasukan.destroy', $pemasukan->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#pemasukan-edit"
                                                            onclick="editPemasukan({{ $pemasukan }})"><i
                                                                data-feather="edit"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="pemasukan-edit">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit pemasukan</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form id="pemasukan-edit-form"
                                        action="{{ route('pemasukan.update', $pemasukan->id ?? '') }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                                value="{{ $pemasukan->tanggal ?? '' }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="jumlah" class="form-label">Jumlah</label>
                                            <input type="text" class="form-control" id="jumlah" name="jumlah"
                                                value="{{ $pemasukan->jumlah ?? '' }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="sumber" class="form-label">Sumber</label>
                                            <input type="text" class="form-control" id="sumber" name="sumber"
                                                value="{{ $pemasukan->sumber ?? '' }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="keterangan" class="form-label">Keterangan</label>
                                            <textarea id="keterangan" name="keterangan" rows="10" cols="143">{{ $pemasukan->keterangan ?? '' }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="pemasukan">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Pemasukan</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <form id="pemasukan" action="{{ route('pemasukan.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="tanggal" class="form-label">Tanggal</label>
                                                <input type="date" class="form-control" id="tanggal"
                                                    name="tanggal" value="{{ old('tanggal') }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="jumlah" class="form-label">Jumlah</label>
                                                <input type="text" class="form-control" id="jumlah"
                                                    name="jumlah" value="{{ old('jumlah') }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="sumber" class="form-label">Sumber</label>
                                                <input type="text" class="form-control" id="sumber"
                                                    name="sumber" value="{{ old('sumber') }}">
                                            </div>
                                            <div class="mb-3">
                                                <p><label for="keterangan" class="form-label">Keterangan</label></p>
                                                <textarea id="keterangan" name="keterangan" rows="10" cols="143" value="{{ old('keterangan') }}"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.control-sidebar -->
                </div>
            </div>


        </div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    {{-- EDIT --}}
    <script>
        function editPemasukan(pemasukan) {
            document.getElementById('pemasukan-edit-form').action = `/pemasukan/${pemasukan.id}`;
            document.getElementById('tanggal').value = pemasukan.tanggal;
            document.getElementById('jumlah').value = pemasukan.jumlah;
            document.getElementById('sumber').value = pemasukan.sumber;
            document.getElementById('keterangan').value = pemasukan.keterangan;
        }
    </script>

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

</body>

</html>

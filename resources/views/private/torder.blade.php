<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transport Order</title>

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
    {{-- Style.css --}}
    <link rel="stylesheet" href="{{ asset('css/style-dlm.css') }}">
    {{-- Alert --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Transport Order</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-none d-sm-inline-block">

                    <a href="{{ route('actionlogout') }}" class="nav-link"><i data-feather="log-out"></i>LogOut</a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a style="text-decoration: none" href="#" class="brand-link">
                <img src="{{ asset('asset/img/logo.png') }}" alt="CV Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">CV. Ary & Agha</span>
            </a>

            <div class="sidebar">
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
                                <a href="/torder" class="nav-link active">
                                    <i class="nav-icon" data-feather="truck"></i>
                                    <p>
                                        Transport Order
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
                </div>
        </aside>
        {{-- Alert --}}
        @if (session('Success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: '{{ session('Success') }}',
                        confirmButtonText: 'OK'
                    });
                });
            </script>
        @endif
        @if ($errors->any())
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        html: '<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
                        confirmButtonText: 'OK'
                    });
                });
            </script>
        @endif

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Transport Order</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Transport Order</a></li>
                                <li class="breadcrumb-item active">Transport Order</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">Transport Order</h3>
                                        <a style="text-decoration: none" href="#torder-add" data-bs-toggle="modal"
                                            data-bs-target="#"><i data-feather="plus"></i>
                                            Tambah
                                        </a>
                                    </div>
                                    <div class="card-body table-responsive">
                                        <table id="torder-table" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10%">Perusahaan</th>
                                                    <th style="width: 8%">Jenis Barang</th>
                                                    <th style="width: 16,5%">No SPK</th>
                                                    <th style="width: 16,5%">No DO</th>
                                                    <th style="width: 10%">Quantity (KG)</th>
                                                    <th style="width: 10%">Tujuan Bongkar</th>
                                                    <th style="width: 10%">Stock Point</th>
                                                    <th style="width: 12%">Estimasi Pembayaran</th>
                                                    <th style="width: 7%">Progress</th>
                                                    <th style="width: 30px"></th>
                                                    <th style="width: 30px"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tbody>
                                                @foreach ($orders as $order)
                                                    <tr>
                                                        <td>{{ $order->perusahaan }}</td>
                                                        <td>{{ $order->j_barang }}</td>
                                                        <td>{{ $order->no_spk }}</td>
                                                        <td><a href=""
                                                                style="text-decoration: none">{{ $order->no_do }}</a>
                                                        </td>
                                                        <td>{{ number_format($order->t_barang, 0, ',', '.') }} Kg</td>
                                                        <td>{{ $order->t_bongkar }}</td>
                                                        <td>{{ $order->t_angkut }}</td>
                                                        <td>Rp
                                                            {{ number_format($order->t_barang * $order->jumlah - ($order->pph / 100) * ($order->jumlah * $order->t_barang) + ($order->ppn / 100) * ($order->t_barang * $order->jumlah), 0, ',', '.') }}
                                                        </td>
                                                        <td>{{ $order->progress }}</td>
                                                        <td>
                                                            <a href="#"
                                                                onclick="event.preventDefault(); deleteTOrder({{ $order->id }})">
                                                                <i data-feather="trash-2"></i>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#torder-edit"
                                                                onclick="editTOrder({{ $order }})">
                                                                <i data-feather="edit"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="torder-add" tabindex="-1"
                                aria-labelledby="torderModalLabelAdd" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="torderModalLabelAdd">Tambah Transport Order
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="add-torder" method="POST"
                                                action="{{ route('torder.store') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="perusahaan">Perusahaan</label>
                                                    <input type="text" class="form-control" id="perusahaan"
                                                        name="perusahaan" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="no_spk">No SPK</label>
                                                    <input type="text" class="form-control" id="no_spk"
                                                        name="no_spk" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="no_do">No DO</label>
                                                    <input type="text" class="form-control" id="no_do"
                                                        name="no_do" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="j_barang">Jenis Barang</label>
                                                    <input type="text" class="form-control" id="j_barang"
                                                        name="j_barang" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jumlah">Ongkos Angkut</label>
                                                    <input type="number" class="form-control" id="jumlah"
                                                        name="jumlah" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ppn">PPN(%)</label>
                                                    <input type="decimal" class="form-control" id="ppn"
                                                        name="ppn" step="any" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pph">PPH(%)</label>
                                                    <input type="decimal" class="form-control" id="pph"
                                                        name="pph" step="any" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="t_susut">Toleransi Susut(%)</label>
                                                    <input type="decimal" class="form-control" id="t_susut"
                                                        name="t_susut" step="any" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="c_susut">Claim Susut (Rp/KG)</label>
                                                    <input type="number" class="form-control" id="c_susut"
                                                        name="c_susut" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="t_barang">Quantity(KG)</label>
                                                    <input type="number" class="form-control" id="t_barang"
                                                        name="t_barang" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="t_bongkar">Tujuan Bongkar</label>
                                                    <input type="text" class="form-control" id="t_bongkar"
                                                        name="t_bongkar" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="t_angkut">Stock Point</label>
                                                    <input type="text" class="form-control" id="t_angkut"
                                                        name="t_angkut" required>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="torder-edit" tabindex="-1"
                                aria-labelledby="torderModalLabelEdit" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="torderModalLabelEdit">Edit Transport Order
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="edit-torder" method="POST"
                                                action="{{ route('torder.update', $order->id ?? '') }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="perusahaanedit">Perusahaan</label>
                                                    <input type="text" class="form-control" id="perusahaanedit"
                                                        name="perusahaanedit" value="{{ $order->perusahaan ?? '' }}"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="no_spkedit">No SPK</label>
                                                    <input type="text" class="form-control" id="no_spkedit"
                                                        name="no_spkedit" value="{{ $order->no_spk ?? '' }}"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="no_doedit">No DO</label>
                                                    <input type="text" class="form-control" id="no_doedit"
                                                        name="no_doedit" value="{{ $order->no_do ?? '' }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="j_barangedit">Jenis Barang</label>
                                                    <input type="text" class="form-control" id="j_barangedit"
                                                        name="j_barangedit" value="{{ $order->j_barang ?? '' }}"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jumlahedit">Ongkos Angkut</label>
                                                    <input type="float" class="form-control" id="jumlahedit"
                                                        name="jumlahedit" value="{{ $order->jumlah ?? '' }}"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="ppnedit">PPN (%)</label>
                                                    <input type="number" class="form-control" id="ppnedit"
                                                        name="ppnedit" step="any"
                                                        value="{{ $order->ppn ?? '' }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="pphedit">PPH (%)</label>
                                                    <input type="number" class="form-control" id="pphedit"
                                                        name="pphedit" step="any"
                                                        value="{{ $order->pph ?? '' }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="t_susutedit">Toleransi Susut (%)</label>
                                                    <input type="number" class="form-control" id="t_susutedit"
                                                        name="t_susutedit" step="any"
                                                        value="{{ $order->t_susut ?? '' }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="c_susutedit">Claim Susut (Rp/KG)</label>
                                                    <input type="float" class="form-control" id="c_susutedit"
                                                        name="c_susutedit" value="{{ $order->c_susut ?? '' }}"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="t_barangedit">Quantity(KG)</label>
                                                    <input type="float" class="form-control" id="t_barangedit"
                                                        name="t_barangedit" value="{{ $order->t_barang ?? '' }}"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="t_bongkaredit">Tujuan Bongkar</label>
                                                    <input type="text" class="form-control" id="t_bongkaredit"
                                                        name="t_bongkaredit" value="{{ $order->t_bongkar ?? '' }}"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="t_angkutedit">Stock Point</label>
                                                    <input type="text" class="form-control" id="t_angkutedit"
                                                        name="t_angkutedit" value="{{ $order->t_angkut ?? '' }}"
                                                        required>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="hapus-torder">
                                    <form id="deleteTOrder" method="POST" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header border-0">
                                        <div class="d-flex justify-content-between">
                                            <h3 class="card-title">Progress Transport</h3>
                                            <a style="text-decoration: none" href="#" data-bs-toggle="modal"
                                                data-bs-target="#pengeluaran-add"><i data-feather="plus"></i>
                                                Tambah
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body table-responsive">
                                        <table id="torder-table"
                                            class="table table-bordered table-striped table-ptransport">
                                            <thead>
                                                <thead>
                                                    <tr>
                                                        <th class="no_spb" rowspan="2">NO DO</th>
                                                        <th colspan="2">ARMADA PENGANGKUT</th>
                                                        <th colspan="2">TANGGAL</th>
                                                        <th colspan="3">QUANTITY (KG)</th>
                                                        <th class="no_spb" rowspan="2">NO SPB</th>
                                                        <th rowspan="2"></th>
                                                        <th rowspan="2"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>PLAT NOMOR</th>
                                                        <th>SUPIR</th>
                                                        <th>MUAT</th>
                                                        <th>BONGKAR</th>
                                                        <th>MUAT</th>
                                                        <th>BONGKAR</th>
                                                        <th>SUSUT</th>
                                                    </tr>
                                                </thead>
                                            <tbody>
                                            <tbody>
                                                {{-- @foreach ($orders as $order)
                                                @endforeach --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="{{ asset('css/AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('css/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- DataTables & Plugins -->
        <script src="{{ asset('css/AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('css/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('css/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('css/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('css/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('css/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('css/AdminLTE/plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('css/AdminLTE/plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('css/AdminLTE/plugins/pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('css/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('css/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('css/AdminLTE/dist/js/adminlte.min.js') }}"></script>
        {{-- JS --}}
        <script src="{{ asset('JS/script.js') }}"></script>
        <script>
            feather.replace();
        </script>
</body>

</html>

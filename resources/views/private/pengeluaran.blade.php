<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengeluaran</title>

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
                    <a href="#" class="nav-link">Pengeluaran</a>
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
                            <li class="nav-item">
                                <a href="/torder" class="nav-link">
                                    <i class="nav-icon" data-feather="truck"></i>
                                    <p>
                                        Transport Order
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item menu-open">
                                <a href="/pengeluaran" class="nav-link active">
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
                            <h1 class="m-0">Pengeluaran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                {{--  --}}
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
                                        <h3 class="card-title">Pengeluaran</h3>
                                        <a style="text-decoration: none" href="#" data-bs-toggle="modal"
                                            data-bs-target="#pengeluaran-add"><i data-feather="plus"></i>
                                            Tambah
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body table-responsive">
                                    <table id="pengeluaran-table" class="table table-bordered table-striped">
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
                                            @foreach ($data_pengeluaran as $pengeluaran)
                                                <tr>
                                                    <td>{{ $pengeluaran->tanggal }}</td>
                                                    <td>Rp. {{ number_format($pengeluaran->jumlah, 0, ',', '.') }}</td>
                                                    <td>{{ $pengeluaran->sumber }}</td>
                                                    <td>{{ $pengeluaran->keterangan }}</td>
                                                    <td>
                                                        <a href="#"
                                                            onclick="event.preventDefault(); deletePengeluaran({{ $pengeluaran->id }})">
                                                            <i data-feather="trash-2"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#pengeluaran-edit"
                                                            onclick="editPengeluaran({{ $pengeluaran }})">
                                                            <i data-feather="edit"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hapus-pengeluaran">
                        <form id="deletePengeluaran" method="POST" style="display:none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>

                    <div class="modal fade" id="pengeluaran-edit">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Pengeluaran</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="edit-pengeluaran"
                                        action="{{ route('pengeluaran.update', $pengeluaran->id ?? '') }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                                value="{{ $pengeluaran->tanggal ?? '' }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="jumlah" class="form-label">Jumlah</label>
                                            <input type="number" class="form-control" id="jumlah" name="jumlah"
                                                value="{{ $pengeluaran->jumlah ?? '' }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="sumber" class="form-label">Sumber</label>
                                            <input type="text" class="form-control" id="sumber" name="sumber"
                                                value="{{ $pengeluaran->sumber ?? '' }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="keterangan" class="form-label">Keterangan</label>
                                            <textarea id="keterangan" name="keterangan" rows="10" cols="143">{{ $pengeluaran->keterangan ?? '' }}</textarea>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="button" class="btn btn-danger"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="pengeluaran-add">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Pengeluaran</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <form id="pengeluaran" action="{{ route('pengeluaran.store') }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="tanggal" class="form-label">Tanggal</label>
                                                <input type="date" class="form-control" id="tanggal"
                                                    name="tanggal" value="{{ old('tanggal') }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="jumlah" class="form-label">Jumlah</label>
                                                <input type="number" class="form-control" id="jumlah"
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
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="button" class="btn btn-danger"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                                </form>
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
    {{-- Save PDF --}}
    <script>
        $(function() {
            $("#torder-table").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [{
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':not(:nth-last-child(-n+2))' // Mengecualikan dua kolom terakhir
                        },
                        customize: function(doc) {
                            doc.styles.tableBodyEven.alignment = 'left';
                            doc.styles.tableBodyOdd.alignment = 'left';
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':not(:nth-last-child(-n+2))' // Mengecualikan dua kolom terakhir
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':not(:nth-last-child(-n+2))' // Mengecualikan dua kolom terakhir
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':not(:nth-last-child(-n+2))' // Mengecualikan dua kolom terakhir
                        }
                    }
                ]
            }).buttons().container().appendTo('#torder-table_wrapper .col-md-6:eq(0)');
        });

        $(function() {
            $("#pengeluaran-table").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [{
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':not(:nth-last-child(-n+2))' // Mengecualikan dua kolom terakhir
                        },
                        customize: function(doc) {
                            doc.styles.tableBodyEven.alignment = 'left';
                            doc.styles.tableBodyOdd.alignment = 'left';
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':not(:nth-last-child(-n+2))' // Mengecualikan dua kolom terakhir
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':not(:nth-last-child(-n+2))' // Mengecualikan dua kolom terakhir
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':not(:nth-last-child(-n+2))' // Mengecualikan dua kolom terakhir
                        }
                    }
                ]
            }).buttons().container().appendTo('#pengeluaran-table_wrapper .col-md-6:eq(0)');
        });
    </script>
    {{-- JS --}}
    <script src="{{ asset('JS/script.js') }}"></script>
    <script>
        feather.replace();
    </script>
</body>

</html>

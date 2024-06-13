<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    {{-- Style.css --}}
    <link rel="stylesheet" href="{{ asset('css/style-dlm.css') }}">
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
                    <a href="#" class="nav-link">Invoice</a>
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
                                <a href="/invoice menu-open" class="nav-link active">
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
                            <h1 class="m-0">Invoice</h1>
                        </div>
                        <div class="col-sm-6">
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
                                        <h3 class="card-title">Invoice</h3>
                                        <a style="text-decoration: none" href="#" data-bs-toggle="modal"
                                            data-bs-target="#invoice-add"><i data-feather="plus"></i>
                                            Tambah
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body table-responsive">
                                    <table id="invoice-table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%">Tanggal Masuk</th>
                                                <th style="width: 10%">Tanggal Kirim</th>
                                                <th style="width: 15%">Nomor Invoice</th>
                                                <th style="width: 20%">Status Invoice</th>
                                                <th style="width: 15%">Jumlah Ditagih</th>
                                                <th style="width: 15%">Jumlah Dibayar</th>
                                                <th style="width: 15%">Nomor Pajak</th>
                                                <th style="width: 15%">Nominal Pajak</th>
                                                <th style="width: 15%"></th>
                                                <th style="width: 15%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- tanngal pembayaran kalau terlambat kenak --}}
                                            @foreach ($data_invoice as $invoice)
                                                <tr>
                                                    <td>{{ $invoice->t_masuk }}</td>
                                                    <td>{{ $invoice->t_kirim }}</td>
                                                    <td>{{ $invoice->i_nomor }}</td>
                                                    <td>{{ $invoice->status }}</td>
                                                    <td>Rp. {{ number_format($invoice->j_ditagih, 0, ',', '.') }}</td>
                                                    <td>Rp. {{ number_format($invoice->j_dibayar, 0, ',', '.') }}</td>
                                                    <td>{{ $invoice->n_pajak }}</td>
                                                    <td>Rp. {{ number_format($invoice->nom_pajak, 0, ',', '.') }}</td>
                                                    <td>
                                                        <a href="#"
                                                            onclick="event.preventDefault(); deleteInvoice({{ $invoice->id }})">
                                                            <i data-feather="trash-2"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#invoice-edit"
                                                            onclick="editInvoice({{ $invoice }})">
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

                    <div class="hapus-invoice">
                        <form id="deleteInvoice" method="POST" style="display:none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>

                    <div class="modal fade" id="invoice-edit">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Invoice</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="edit-invoice"
                                        action="{{ route('invoice.update', $invoice->id ?? '') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="editt_masuk" class="form-label">Tanggal Masuk</label>
                                            <input type="date" class="form-control" id="editt_masuk"
                                                name="editt_masuk" value="{{ $invoice->t_masuk ?? '' }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="editt_kirim" class="form-label">Tanggal Kirim</label>
                                            <input type="date" class="form-control" id="editt_kirim"
                                                name="editt_kirim" value="{{ $invoice->t_kirim ?? '' }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="editdurasi" class="form-label">Durasi Pembayaran
                                                (Hari)</label>
                                            <input type="number" class="form-control" id="editdurasi"
                                                name="editdurasi" value="{{ $invoice->durasi ?? '' }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="editi_nomor" class="form-label">Nomor Invoice</label>
                                            <input type="text" class="form-control" id="editi_nomor"
                                                name="editi_nomor" value="{{ $invoice->i_nomor ?? '' }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="editj_ditagih" class="form-label">Jumlah Ditagih</label>
                                            <input type="number" class="form-control" id="editj_ditagih"
                                                name="editj_ditagih" value="{{ $invoice->j_ditagih ?? '' }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="editj_dibayar" class="form-label">Jumlah Dibayar</label>
                                            <input type="number" class="form-control" id="editj_dibayar"
                                                name="editj_dibayar" value="{{ $invoice->j_dibayar ?? '' }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="editn_pajak" class="form-label">Nomor Pajak</label>
                                            <input type="text" class="form-control" id="editn_pajak"
                                                name="editn_pajak" value="{{ $invoice->n_pajak ?? '' }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="editnom_pajak" class="form-label">Nominal Pajak</label>
                                            <input type="number" class="form-control" id="editnom_pajak"
                                                name="editnom_pajak" value="{{ $invoice->nom_pajak ?? '' }}">
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

                    <div class="modal fade" id="invoice-add">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Invoice</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <form id="invoice" action="{{ route('invoice.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="t_masuk" class="form-label">Tanggal Masuk</label>
                                                <input type="date" class="form-control" id="t_masuk"
                                                    name="t_masuk" value="{{ old('t_masuk') }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="t_kirim" class="form-label">Tanggal Kirim</label>
                                                <input type="date" class="form-control" id="t_kirim"
                                                    name="t_kirim" value="{{ old('t_kirim') }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="durasi" class="form-label">Durasi Pembayaran
                                                    (Hari)</label>
                                                <input type="number" class="form-control" id="durasi"
                                                    name="durasi" value="{{ old('durasi') }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="i_nomor" class="form-label">Nomor Invoice</label>
                                                <input type="text" class="form-control" id="i_nomor"
                                                    name="i_nomor" value="{{ old('i_nomor') }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="j_ditagih" class="form-label">Jumlah Ditagih</label>
                                                <input type="number" class="form-control" id="j_ditagih"
                                                    name="j_ditagih" value="{{ old('j_ditagih') }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="j_dibayar" class="form-label">Jumlah Dibayar</label>
                                                <input type="number" class="form-control" id="j_dibayar"
                                                    name="j_dibayar" value="{{ old('j_dibayar') }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="n_pajak" class="form-label">Nomor Pajak</label>
                                                <input type="text" class="form-control" id="n_pajak"
                                                    name="n_pajak" value="{{ old('n_pajak') }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nom_pajak" class="form-label">Nominal Pajak</label>
                                                <input type="number" class="form-control" id="nom_pajak"
                                                    name="nom_pajak" value="{{ old('nom_pajak') }}">
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
            $("#invoice-table").DataTable({
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
            }).buttons().container().appendTo('#invoice-table_wrapper .col-md-6:eq(0)');
        });
    </script>
    {{-- JS --}}
    <script src="{{ asset('JS/script.js') }}"></script>
    <script>
        feather.replace();
    </script>
</body>

</html>

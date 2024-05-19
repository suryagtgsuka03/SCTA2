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
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE/dist/css/adminlte.min.css') }}">
    <!-- FeatherIcon -->
    <script src="https://unpkg.com/feather-icons"></script>
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
                    <a href="#" class="nav-link">Pembukuan</a>
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
                                <a href="/invoice menu-open" class="nav-link active">
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
                            <h1 class="m-0">Pembukuan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
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
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">Online Store Visitors</h3>
                                        <a href="javascript:void(0);">View Report</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex">
                                        <p class="d-flex flex-column">
                                            <span class="text-bold text-lg">820</span>
                                            <span>Visitors Over Time</span>
                                        </p>
                                        <p class="ml-auto d-flex flex-column text-right">
                                            <span class="text-success">
                                                <i class="fas fa-arrow-up"></i> 12.5%
                                            </span>
                                            <span class="text-muted">Since last week</span>
                                        </p>
                                    </div>
                                    <!-- /.d-flex -->

                                    <div class="position-relative mb-4">
                                        <canvas id="visitors-chart" height="200"></canvas>
                                    </div>

                                    <div class="d-flex flex-row justify-content-end">
                                        <span class="mr-2">
                                            <i class="fas fa-square text-primary"></i> This Week
                                        </span>

                                        <span>
                                            <i class="fas fa-square text-gray"></i> Last Week
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="card">
                              <div class="card-header border-0">
                                  <div class="d-flex justify-content-between">
                                      <h3 class="card-title">Online Store Visitors</h3>
                                      <a href="javascript:void(0);">View Report</a>
                                  </div>
                              </div>
                              <div class="card-body">
                                  <div class="d-flex">
                                      <p class="d-flex flex-column">
                                          <span class="text-bold text-lg">820</span>
                                          <span>Visitors Over Time</span>
                                      </p>
                                      <p class="ml-auto d-flex flex-column text-right">
                                          <span class="text-success">
                                              <i class="fas fa-arrow-up"></i> 12.5%
                                          </span>
                                          <span class="text-muted">Since last week</span>
                                      </p>
                                  </div>
                                  <!-- /.d-flex -->

                                  <div class="position-relative mb-4">
                                      <canvas id="visitors-chart" height="200"></canvas>
                                  </div>

                                  <div class="d-flex flex-row justify-content-end">
                                      <span class="mr-2">
                                          <i class="fas fa-square text-primary"></i> This Week
                                      </span>

                                      <span>
                                          <i class="fas fa-square text-gray"></i> Last Week
                                      </span>
                                  </div>
                              </div>
                          </div>
                      </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
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
</body>

</html>

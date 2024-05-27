<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CV. ARY & AGHA</title>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,100;1,400;1,700&display=swap"
        rel="stylesheet">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    {{-- Start Nav --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light animate__animated animate__fadeInDown">
        <div class="container-fluid">
            <a class="navbar-brand responsive" href="http://127.0.0.1:8000/"><img
                    src="{{ asset('asset/img/logo_lengkap.png') }}" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse justify-content-center collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#hr">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#bg">Background</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sv">Sevices</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ct">Contact</a>
                    </li>
                </ul>
            </div>
            <a type="button" class="btn btn-outline-primary d-flex justify-content-end" href="/login">Login</a>
        </div>
    </nav>
    {{-- Close Nav --}}

    {{-- Start Hero --}}
    <section class="hero" id="hr">
        <main class="row">
            <div class="col animate__animated animate__zoomIn"><img src="{{ asset('asset/img/logo.png') }}"
                    alt=""></div>
            <div class="col text animate__animated animate__fadeIn">
                <h1>CV . ARY & AGHA</h1>
                <h3>Direct To Every Direction </h3>
            </div>
        </main>
    </section>
    {{-- Close Hero --}}
    {{-- Start Background --}}
    <section class="background " id="bg">
        <main class="content-CB animated">
            <div class="text">
                <h1>Company Profile</h1>
                <p>CV. ARY & AGHA, merupakan perusahaan jasa pengangkutan yang berfokus pada pengangkutan dan pengiriman
                    hasil dan segala barang yang erat dengan perkebunan. sejak tahun 2005,. Dalam mengoperasikan
                    bisnisnya, CV. ARY & AGHA memiliki armada truk pengiriman yang didesain khusus untuk mengangkut
                    hasil dan barang yang erat dengan perkebunan, seperti kelapa sawit, cangkang, inti sawit, ampas,
                    pupuk, dan herbisida. TRUCKING COMPANY 2023 COMPANY BACKGROUND Perusahaan ini memiliki tim pengemudi
                    yang berpengalaman dan terlatih dalam mengoperasikan truk di daerah perkebunan yang sulit dijangkau.
                    Dalam menjalankan bisnisnya, CV. ARY & AGHA selalu mengutamakan keamanan dan kualitas pengiriman,
                    serta berupaya memberikan layanan yang cepat dan terpercaya bagi pelanggannya.
                </p><br>
            </div>
            <div class="transport ">
                <div class="text">
                    <h1>Transport</h1>
                </div>
                <div class="row">
                    <div class="menu-card">
                        <img class="card-img-top" src="{{ asset('asset/img/sawit.jpg') }}" alt="Sawit">
                        <h5 class="card-title">Sawit</h5>
                    </div>
                    <div class="menu-card">
                        <img class="card-img-top" src="{{ asset('asset/img/cangkang.jpeg') }}" alt="Cangkang">
                        <h5 class="card-title">Cangkang</h5>
                    </div>
                    <div class="menu-card">
                        <img class="card-img-top" src="{{ asset('asset/img/inti-sawit.png') }}" alt="Inti Sawit">
                        <h5 class="card-title">Inti Sawit</h5>
                    </div>
                    <div class="menu-card">
                        <img class="card-img-top" src="{{ asset('asset/img/ampas.jpg') }}" alt="Ampas">
                        <h5 class="card-title">Ampas</h5>
                    </div>
                    <div class="menu-card">
                        <img class="card-img-top" src="{{ asset('asset/img/pupuk.jpg') }}" alt="Pupuk">
                        <h5 class="card-title">Pupuk</h5>
                    </div>
                    <div class="menu-card">
                        <img class="card-img-top" src="{{ asset('asset/img/herbisida.jpg') }}" alt="Herbisida">
                        <h5 class="card-title">Herbisida</h5>
                    </div>
                </div>
            </div>
            <br>
            <div class="vdm">
                <div class="text">
                    <h1>Visi & Misi</h1>
                </div>
                <div class="row">
                    <div class="vdmc">
                        <h2>Visi</h2><br>
                        <p>Menjadi perusahaan truk terkemuka yang terpercaya dan
                            memimpin dalam memberikan solusi logistik yang handal, inovatif,
                            dan berkelanjutan</p>
                    </div>
                    <div class="vdmc">
                        <h2>Misi</h2><br>
                        <p>Memberikan layanan truk yang efisien, aman, dan terpercaya
                            kepada pelanggan.
                        </p>
                        <p>Mengembangkan solusi pengangkutan yang inovatif dan
                            berkelanjutan untuk memenuhi kebutuhan.
                        </p>
                        <p>Mengembangkan sumber daya manusia yang berkualitas,
                            termotivasi, dan jujur untuk memberikan layanan yang terbaik
                            kepada pelanggan.
                        </p>
                        <p>Menjaga integritas dan komunikasi yang baik antar
                            stakeholder demi kepuasan pelanggan.</p>
                    </div>
                </div>
            </div>
        </main>
    </section>
    {{-- Close Background --}}
    {{-- Start Service --}}
    <section class="service" id="sv">
        <main class="content-SV animated">
            <div class="transport">
                <div class="text">
                    <h1>Service</h1>
                    <br>
                    <h3>Armada</h3>
                </div>
                <div class="row">
                    <div class="menu-card">
                        <img class="card-img-top" src="{{ asset('asset/img/engkel.JPG') }}" alt="Engkel">
                        <h5 class="card-title">Engkel</h5>
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#engkel">
                            Detail >
                        </button>
                    </div>
                    <div class="menu-card">
                        <img class="card-img-top" src="{{ asset('asset/img/CD.jpg') }}" alt="Colt Diesel">
                        <h5 class="card-title">Colt Diesel</h5>
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#CD">
                            Detail >
                        </button>
                    </div>
                    <div class="menu-card">
                        <img class="card-img-top" src="{{ asset('asset/img/tronton.jpeg') }}" alt="Tronton">
                        <h5 class="card-title">Tronton</h5>
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#tronton">
                            Detail >
                        </button>
                    </div>
                    <div class="menu-card">
                        <img class="card-img-top" src="{{ asset('asset/img/trinton.jpeg') }}" alt="Trinton">
                        <h5 class="card-title">Trinton</h5>
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#trinton">
                            Detail >
                        </button>
                    </div>
                </div>
            </div>
            <br>
            <div class="wilayah">
                <div class="text">
                    <h1>Wilayah Operasional</h1>
                    <img src="{{ asset('asset/img/maps.png') }}" alt="">
                </div>
            </div>
        </main>
        {{-- Modal truk --}}
        <div class="modal" id="engkel">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Engkel</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="grid-container">
                            <div class="item1">
                                <img src="{{ asset('asset/img/engkel.JPG') }}" alt="">
                            </div>
                            <div class="item2">
                                <table>
                                    <tr>
                                        <th><h1>SPESIFIKASI</h1></th>
                                    </tr>
                                    <tr>
                                        <th>Muatan</th>
                                        <th>1 TON</th>
                                    </tr>
                                    <tr>
                                        <th>Tahun</th>
                                        <th>2010</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="CD">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Colt Diesel</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="grid-container">
                            <div class="item1">
                                <img src="{{ asset('asset/img/CD.JPG') }}" alt="">
                            </div>
                            <div class="item2">
                                <table>
                                    <tr>
                                        <th><h1>SPESIFIKASI</h1></th>
                                    </tr>
                                    <tr>
                                        <th>Muatan</th>
                                        <th>1 TON</th>
                                    </tr>
                                    <tr>
                                        <th>Tahun</th>
                                        <th>2010</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal" id="tronton">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Tronton</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="grid-container">
                            <div class="item1">
                                <img src="{{ asset('asset/img/tronton.jpeg') }}" alt="">
                            </div>
                            <div class="item2">
                                <table>
                                    <tr>
                                        <th><h1>SPESIFIKASI</h1></th>
                                    </tr>
                                    <tr>
                                        <th>Muatan</th>
                                        <th>2 -2,5 TON</th>
                                    </tr>
                                    <tr>
                                        <th>Tahun</th>
                                        <th>2010</th>
                                    </tr>
                                    <tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal" id="trinton">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Trinton</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="grid-container">
                            <div class="item1">
                                <img src="{{ asset('asset/img/trinton.jpeg') }}" alt="">
                            </div>
                            <div class="item2">
                                <table>
                                    <tr>
                                        <th><h1>SPESIFIKASI</h1></th>
                                    </tr>
                                    <tr>
                                        <th>Muatan</th>
                                        <th>14 - 45 TON</th>
                                    </tr>
                                    <tr>
                                        <th>Tahun</th>
                                        <th>2010</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </section>
    {{-- Close Service --}}
    {{-- Start Contact --}}
    <section class="contact " id="ct">
        <main class="content-CT animated">
            <div class="text">
                <h1>Contact Us</h1>
                <h3>Direct To <span>Every Direction</span></h3>
            </div>
            <br>
            <div class="list">
                <div class="row">
                    <div class="menu-card">
                        <i data-feather="truck"></i>
                        <br><br>
                        <h3>Office</h3>
                        <li>
                            JALAN DURI - DUMAI, KM 25 RAWA PENDEK - BUKIT KAPUR
                        </li>
                        <li>
                            JALAN AIR HITAM PEKANBARU
                        </li>
                        <li>
                            JALAN BOUGENVILLE 3 NO.44 MEDAN
                        </li>
                    </div>
                    <div class="menu-card">
                        <i data-feather="mail"></i>
                        <br><br>
                        <h3>Email</h3>
                        <li>
                            ary.agha13@gmail.com
                        </li>
                    </div>
                    <div class="menu-card">
                        <i data-feather="phone"></i>
                        <br><br>
                        <h3>Office</h3>
                        <li>
                            +62 813-6567-8344
                        </li>
                    </div>
                </div>
            </div>
        </main>
    </section>
    {{-- Close Contact --}}

    {{-- JS Script --}}
    <script>
        feather.replace();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> 
    <script src="{{ asset('JS/script.js') }}"></script>
</body>

</html>

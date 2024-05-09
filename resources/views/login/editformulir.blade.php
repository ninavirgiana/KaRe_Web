<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Kartoharjo Recycle</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/kare.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.cssa') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/kare.png') }}" alt="">
                <span class="d-none d-lg-block">Kartoharjo Recycle</span>
            </a>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="{{ route('profil') }}"
                        data-bs-toggle="dropdown">
                        {{-- <img src="{{ asset('nice-admin/assets/img/profile-img.jpg') }}" alt="Profile" --}}
                        {{-- <img src="assets/img/default-profile.png" alt="Profile" class="rounded-circle"> --}}
                        <span class="d-none d-md-block dropdown-toggle ps-2" href="{{ route('profil') }}">{{ Auth::user()->nama_user }}</span>
                        {{-- <span class="d-none d-md-block dropdown-toggle ps-2" href="{{ route('profil') }}">{{ $user->nama_user }}</span> --}}
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <!-- <h6>Kevin Anderson</h6>
              <span>Web Designer</span> -->
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('profil') }}">
                                <i class="bi bi-person"></i>
                                <span>Akun</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>




                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item d-flex align-items-center">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Keluar</span>
                                </button>
                            </form>
                        </li>
                        {{-- <li>
              <a class="dropdown-item d-flex align-items-center" href="login">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Keluar</span>
              </a>
          </li> --}}

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('berandalogin') }}">
                    <i class="bi bi-grid"></i>
                    <span>Beranda</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link " href="{{ route('detailpengajuan') }}">
                    <i class="bi bi-people-fill"></i>
                    <span>Kunjungan</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('tabungan') }}">
                    <i class="bi bi-wallet2"></i>
                    <span>Tabungan</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->
        </ul>




        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Layanan Kunjungan</h1>
            <nav>
                <ol class="breadcrumb">
                    <!-- <li class="breadcrumb-item"><a href="index.html">Beranda</a></li> -->
                    <!-- <li class="breadcrumb-item">Layanan Kunjungan</li> -->
                    <li class="breadcrumb-item"><a href="{{ route('detailpengajuan') }}">Kunjungan</a></li>
                    <li class="breadcrumb-item">Edit Pengajuan</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" style="text-align: center;">Formulir Pengajuan Kunjungan</h5>

                                <!-- Elemen Formulir Umum -->
                                <form action="{{ route('update', ['id' => $kunjungan->id_kunjungan]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nama"
                                                value="{{ $kunjungan->nama_kunjungan }}" readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Asal</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="asal"
                                                value="{{ $kunjungan->alamat_kunjungan }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Nama Instansi</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nama_instansi"
                                                value="{{ $kunjungan->namainstansi_kunjungan }}">

                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-sm-2 col-form-label">Nomor Telepon</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="nomor_telepon"
                                                value="{{ $kunjungan->nohp_kunjungan }}" readonly>

                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="tanggal"
                                                value="{{ $kunjungan->tgl_kunjungan }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Tujuan
                                            Kunjungan</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" style="height: 100px" name="tujuan_kunjungan"
                                                value="{{ $kunjungan->tujuan_kunjungan }}">
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Kategori</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" aria-label="Default select example"
                                                name="kategori">
                                                <option value="Kelompok">Kelompok</option>
                                                <option value="Individu">Individu</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Jumlah Orang</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="jumlah_orang"
                                                value="{{ $kunjungan->jumlah_kunjungan }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="id" value="{{ $kunjungan->id_kunjungan }}">
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-success mb-2">
                                                Perbarui Pengajuan <span class="badge bg-white text-success"></span>
                                            </button>
                                            <!-- <button type="submit" class="btn btn-primary">Kirim</button> -->
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
        </section>

    </main><!-- End #main -->




    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>TechTonic</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>

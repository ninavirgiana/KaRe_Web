<?php
// echo route('update.profile', ['id' => $user->id_user]);
// exit();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Kartoharjo Recycle | Profil</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/kare.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

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
            <a href="{{ route('berandalogin') }}" class="logo d-flex align-items-center">
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
                        <img src="{{ url('foto_profil/' . $user->foto_user) }}" class="d-block w-100"
                                        alt="Foto Profil Pengguna">
                        <span class="d-none d-md-block dropdown-toggle ps-2"
                            href="{{ route('profil') }}">{{ Auth::user()->nama_user }}</span>
                        {{-- <span class="d-none d-md-block dropdown-toggle ps-2" href="{{ route('profil') }}">{{ $user->nama_user }}</span> --}}
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <!-- <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li> -->
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
                <a class="nav-link collapsed" href="{{ route('detailpengajuan') }}">
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
    </aside><!--End Sidebar -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Akun Pengguna</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Akun</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section profile">
            <div class="row">
                <div class="col-xl-10">
                    <!-- Konten di dalam kolom -->
                </div>
            </div>
            <!-- <div class="col-xl-8"> -->
            <div class="card">
                <div class="card-body pt-3">
                    <ul class="nav nav-tabs nav-tabs-bordered">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab"
                                data-bs-target="#profile-overview">Detail Akun</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                Akun</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab"
                                data-bs-target="#profile-change-password">Ubah
                                Kata Sandi</button>
                        </li>
                    </ul>

                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                {{-- <img src="{{ asset('/assets/img/' . $user->foto_user) }}" alt="Profile" class="rounded-circle"> --}}
                                @if ($user->foto_user)
                                    <img src="{{ url('foto_profil/' . $user->foto_user) }}" class="d-block w-100"
                                        alt="Foto Profil Pengguna">
                                @else
                                    <img src="{{ url('foto_profil/default.jpg') }}" class="d-block w-100"
                                        alt="Default Foto Profil">
                                @endif

                            </div>
                            <div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nama Lengkap</div>

                                    <div class="col-lg-9 col-md-8">{{ $user->nama_user }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Alamat</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->alamat_user }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->email_user }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nomor Telepon</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->notelp_user }}</div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                        <!-- start Profile Edit Form -->
                        <form action="{{ route('update.profile', ['id' => $user->id_user]) }}" method="POST"
                            enctype="multipart/form-data">
                            {{-- @method('PUT') --}}
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto Profil</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                        name="foto_user" accept="image/*">
                                    <div class="pt-2">
                                        @error('foto')
                                            <div class="invalid-feedback text-danger">
                                                Foto harus diisi <!-- Menampilkan pesan kesalahan validasi -->
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="nama_user" type="text" class="form-control" id="fullName"
                                        value="{{ $user->nama_user }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="email_user" type="email" class="form-control" id="email"
                                        value="{{ $user->email_user }}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phoneNumber" class="col-md-4 col-lg-3 col-form-label">Nomor
                                    Telepon</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="notelp_user" type="tel" class="form-control" id="phoneNumber"
                                        value="{{ $user->notelp_user }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="address" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="alamat_user" type="text" class="form-control" id="address"
                                        value="{{ $user->alamat_user }}">
                                </div>
                            </div>

                            <div class="col-sm-10">
                                <input type="hidden" name="id" value="{{ $user->id_user }}">
                            </div>

                            <div class="btn-hj">
                                <button type="submit" class="btn btn-success mb-2">
                                    Simpan Perubahan <span class="badge bg-white text-success"></span>
                                </button>
                            </div>
                        </form>
                        <!-- End Profile Edit Form -->
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif




                    <div class="tab-pane fade pt-3" id="profile-change-password">
                        <form action="{{ route('gantipassword', ['id' => $user->id_user]) }}" method="POST" enctype="multipart/form-data">
                            @csrf <!-- Token CSRF untuk keamanan -->
                            @method('POST')

                            <div class="row mb-3">
                                <label for="passwordsekarang" class="col-md-4 col-lg-3 col-form-label">Kata Sandi Lama</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="passwordsekarang" type="password" class="form-control"
                                        id="passwordsekarang">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="passwordbaru" class="col-md-4 col-lg-3 col-form-label">Kata Sandi Baru</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="passwordbaru" type="password" class="form-control" id="passwordbaru">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Konfirmasi Kata Sandi</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="konfirmasipassword" type="password" class="form-control"
                                        id="konfirmasipassword">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form><!-- End Change Password Form -->

                    </div>

                </div><!-- End Bordered Tabs -->

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
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Kartoharjo Recycle | Kunjungan</title>
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

                        <img src="{{ url('foto_profil/' . Auth::user()->foto_user) }}"
                            class="d-block w-100 rounded-circle" alt="Foto Profil Pengguna">

                        <span class="d-none d-md-block dropdown-toggle ps-2"
                            href="{{ route('profil') }}">{{ Auth::user()->nama_user }}</span>
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

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Kunjungan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('detailpengajuan') }}">Kunjungan</a></li>
                    <!-- <li class="breadcrumb-item active">Blank</li> -->
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <a href="{{ route('formulirkunjungan') }}" class="btn btn-lg btn-primary btn-lg w-10 mt-2 mb-2">
            <i class="bi bi-plus-lg"></i>
            <span>Tambah</span>
        </a>



        <div class="col lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tabel Pengajuan Kunjungan</h5>

                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Tujuan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($data as $item) --}}
                            @php $no = 1; @endphp
                            @foreach ($data as $item)
                                <form method="POST" action="{{ route('formulirkunjungan', ['id' => $item->id]) }}">
                                    <tr>
                                        {{-- <td>{{ $item->id_kunjungan }}</td> --}}
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->nama_kunjungan }}</td>
                                        {{-- <td>{{ $item->tgl_kunjungan }}</td> --}}
                                        <td>{{ date('d F Y', strtotime($item->tgl_kunjungan)) }}</td>

                                        <td>{{ $item->tujuan_kunjungan }}</td>
                                        <td>
                                            @if ($item->status_kunjungan == 'diajukan')
                                                <button class="btn btn-warning disabled-button">diajukan</button>
                                            @elseif($item->status_kunjungan == 'diterima')
                                                <button class="btn btn-success disabled-button">diterima</button>
                                            @elseif($item->status_kunjungan == 'ditolak')
                                                <button class="btn btn-danger disabled-button">ditolak</button>
                                            @endif
                                            {{-- @elseif ($item->status_kunjungan == 'ditolak')
                                                <button class="btn btn-danger disabled-button"
                                                    data-id="{{ $item->id }}" data-toggle="modal"
                                                    data-target="#modal-alasan-penolakan-{{ $item->id }}"
                                                    title="Lihat Alasan Penolakan">
                                                    <i class="fas fa-times"></i> ditolak
                                                </button>
                                                @include('modal-alasan-penolakan', ['item' => $item])
                                            @endif --}}





                                        </td>
                                        {{-- <td>{{ $item->status_kunjungan }}</td> --}}
                                        <td>
                                            {{-- <a href="{{ url('formulirkunjungan/'.$item->id_kunjungan.'/edit') }}" class="btn btn-success"><i class="bi bi-pencil-fill"></i></a> --}}
                                            {{-- <a href="{{ route('edit', ['id' => $item->id]) }}" class="btn btn-success"><i class="bi bi-pencil-fill"></i></a> --}}

                                            {{-- <a href="{{ url('formulirkunjungan/' . $item->id_kunjungan . '/edit') }}"
                                                class="btn btn-success"><i class="bi bi-pencil-fill"></i></a> --}}
                                            @if ($item->status_kunjungan != 'diterima')
                                                <a href="{{ url('formulirkunjungan/' . $item->id_kunjungan . '/edit') }}"
                                                    class="btn btn-success"><i class="bi bi-pencil-fill"></i></a>
                                            @endif


                                            {{-- <a href="{{ url('formulirkunjungan/'.$item->id.'/edit') }}" class="btn btn-success"><i class="bi bi-pencil-fill"></i></a> --}}
                                            <a href="{{ url('formulirkunjungan/' . $item->id_kunjungan . '/delete') }}"
                                                class="btn btn-danger" data-id="{{ $item->id }}"
                                                data-toggle="modal" data-target="#modal-hapus"><i
                                                    class="bi bi-trash3-fill"
                                                    onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?')"></i></button>
                                        </td>
                                    </tr>
                            @endforeach
                            <!-- End PHP Loop -->
                        </tbody>
                    </table>
                    {{ $data->links() }}

                    <!-- End Table with stripped rows -->

                </div>
            </div>
        </div>
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

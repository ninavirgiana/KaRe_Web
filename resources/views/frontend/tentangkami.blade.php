@extends('sidebar.main')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center">
        </div>
    </div>
    </div>
    </div>
    <nav>
        </div><!-- End Breadcrumbs -->


        <main id="main">
            <!-- ======= About Us Section ======= -->
            <section id="about" class="about pt-0">
                <div class="container" data-aos="fade-up">
                    <div class="container">
                        <div class="section-header">
                            <h2>TENTANG KAMI</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 order-last order-lg-first">
                                <h3>Struktur Organisasi</h3>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 text-center">
                                <img src="{{ asset('assets/img/struktur-organisasi.png') }}" width="1100"
                                    class="img-below-text">
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-lg-6 order-last order-lg-first">
                                <h3>Visi dan Misi</h3>
                                <div>
                                    <h3>Visi</h3>
                                    <p class="custom-justify">
                                        "Mewujudkan Peningkatan Indeks Kualitas Lingkungan Hidup"
                                    </p>
                                </div>
                                <h3>Misi</h3>
                                <ol class="misi-list">
                                    <li>Meningkatkan indeks kualitas air</li>
                                    <li>Meningkatkan indeks kualitas udara</li>
                                    <li>Meningkatkan indeks kualitas tutup lahan</li>
                                    <li>Meningkatkan ruang terbuka hijau diperkotaan</li>
                                    <li>Meningkatkan cakupan area layanan persampahan</li>
                                    <li>Meningkatkan jumlah sampah yang tertangani</li>
                                    <li>Meningkatkan kualitas SDM dalam pengelolaan lingkungan hidup</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- End About Us Section -->
        @endsection

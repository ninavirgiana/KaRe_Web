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


        <!-- ======= Services Section ======= -->
        <section id="service" class="services pt-0">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>LAYANAN PENGELOLAAN SAMPAH</h2>
                </div>
                <div class="row gy-4 justify-content-center">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="card text-center">
                            <div class="card-img">
                                <img src="assets/img/jemputsampah.jpg" alt="" class="img-fluid">
                            </div>
                            <h3><a href="{{ route('penjemputansampah') }}" class="stretched-link">Penjemputan Sampah</a>
                            </h3>
                            <p class="custom-justify">TPST menyediakan layanan penjemputan sampah dari masyarakat untuk
                                memudahkan pembuangan sampah secara efisien.</p>
                        </div>
                    </div><!-- End Card Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="card text-center">
                            <div class="card-img">
                                <img src="assets/img/pembelianpupuk2.jpg" alt="" class="img-fluid">
                            </div>
                            <h3><a href="{{ route('pembelianpupuk') }}" class="stretched-link">Pembelian Pupuk</a></h3>
                            <p class="custom-justify">TPST memberikan layanan kepada masyarakat untuk membeli pupuk hasil
                                dari pengolahan sampah. </p>
                        </div>
                    </div><!-- End Card Item -->
                </div><!-- End Row -->
            </div><!-- End Container -->
        </section><!-- End Services Section -->
    @endsection

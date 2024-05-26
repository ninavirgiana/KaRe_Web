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
                    <h2>GALERI</h2>
                </div>
                <div class="row gy-4">
                    @foreach ($kegiatan as $item)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="card">
                                <div class="card-img">
                                    <img width="370px" src="{{ url('/Images/Kegiatan/' . $item->foto_kegiatan) }}">
                                </div>
                                <h3><a>{{ $item->nama_kegiatan }}</a></h3>
                            </div>
                        </div><!-- End Card Item -->
                    @endforeach
                </div><!-- End Row -->
            </div><!-- End Container -->
            {{ $kegiatan->links() }}
        </section><!-- End Services Section -->
    @endsection

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

  <div class="section-header">
    <h2>PEMBELIAN PUPUK</h2>
  </div>
  <section id="features" class="features">
    <div class="container">
      <div class="row gy-4 align-items-center features-item" data-aos="fade-up">
        <div class="col-md-5">
          <img src="assets/img/kegiatan2.jpeg" class="img-fluid" alt="">
        </div>
        <div class="col-md-7">
          <p class="fst-serif custom-justify">
            Mencari pupuk organik berkualitas tinggi untuk tanaman Anda? Kami tawarkan solusi tepat dengan layanan pembelian pupuk organik hasil olah sampah. Pupuk kami dibuat dari bahan-bahan alami yang telah diolah dengan proses yang ramah lingkungan, sehingga aman bagi tanaman dan tidak mencemari tanah.
          </p>
          <p class="fst-serif custom-justify">
            Pupuk organik kami kaya akan nutrisi yang essential untuk pertumbuhan tanaman yang optimal. Pupuk ini dapat membantu meningkatkan kesuburan tanah, meningkatkan hasil panen, dan membuat tanaman Anda lebih tahan terhadap hama dan penyakit.Pembelian pupuk organik kami dapat dilakukan dengan mudah melalui nomor WhatsApp admin. Kami siap melayani Anda dengan sepenuh hati dan memberikan informasi lebih lanjut mengenai produk dan layanan kami.
          </p>
          <a class="login-blade" href="https://api.whatsapp.com/send?phone=+6282234506102&text=Halo%20Admin%20Saya%20Ingin%20Membeli%20Pupuk" target="_blank"> <button type="submit" class="btn btn-success mb-2">
              Yuk Hubungi Kami di WhatsApp! <span class="badge bg-white text-success"></span>
            </button>
          </a>
        </div>
      </div><!-- Features Item -->
      <table>
        <div class="col-lg-6 order-last order-lg-first">
          <h3>Daftar Harga Pupuk</h3>
        </div>
        <thead>
          <tr>
            <th>Nomor</th>
            <th>Nama Produk</th>
            <th>Deskripsi Produk</th>
            <th>Harga Produk</th>
            <th>Foto Produk</th>
          </tr>
        </thead>
        <tbody>
          @foreach($produk as $item)
            <form method="POST" action="{{ route('pembelianpupuk', ['id' => $item->id]) }}">
              <tr>
                <td>{{ $item->id_produk }}</td>
                <td>{{ $item->nama_produk }}</td>
                <td>{{ $item->deskripsi_produk }}</td>
                <td>{{ $item->harga_produk }}</td>
                <td>{{ $item->foto_produk }}</td>
              </tr>
            </form>
          @endforeach
        </tbody>
      </table>
      
  </section><!-- End Features Section -->
  @endsection
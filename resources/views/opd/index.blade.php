<!DOCTYPE html>
<html lang="en">

<head>
  @include('opd.layout.head')
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    @include('opd.layout.header')
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  @forelse ($sliders as $item)

  <section id="hero" class="d-flex align-items-center" style="margin-top: 100px;">

    <div class="" style="margin: 10%">
      <div class="row">
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>{{ Str::title($item->title) }}</h1>
          <h2>{{ Str::title($item->keterangan) }}.</h2>
          {{-- <div><a href="#about" class="btn-get-started scrollto">Get Started</a></div> --}}
          <div class="row justify-content-md-center mt-4">
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="dua-layanan">
                {{-- <i class="bi bi-card-checklist"></i> --}}
                <h4><a style="color: #f1f8ff" href="#">JDIH</a></h4>
                <p class="satu-baris">Jaringan Dokumentasi dan Informasi Hukum</p>
              </div>
          </div>
  
          <div class="col-6" data-aos="fade-up" data-aos-delay="100">
            <div class="dua-layanan" style="background-color: rgb(36, 36, 36);">
              <h4><a style="color: #f1f8ff" href="#">PPID</a></h4>
              <p class="satu-baris">(Badan publik dapat mempublikasi informasi yang dikuasai yang selanjutnya tersusun sebagai DIP secara otomatis.)</p>
            </div>
          </div>
          {{-- @endforelse --}}
  
        </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="{{$item->image}}" class="img-fluid rounded" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  @empty
  <section id="hero" class="d-flex align-items-center" style="background-image: url({{ asset('assets-opd/img/image-kosong.png') }});
    background-repeat: no-repeat;
    background-position: right 200% bottom;
    background-size: cover;
    width: 100%;">
      <div style="margin: 3%;" class="hero-single">
        <div class="row">
          <div class="col-lg-12 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
            {{-- <h1>Belum diisi</h1>
            <h2>Belum diisi</h2> --}}
  
            <div>
            </div>
  
          </div>
          <div class="col-lg-4 order-1 order-lg-2 hero-img rounded">
            {{-- <img src="{{$item->image}}" class="img-fluid" alt=""> --}}
          </div>
        </div>
      </div>
  </section>

  @endforelse

  <main id="main">
    <!-- ======= Icon Boxes Section ======= -->
    {{-- <section id="icon-boxes" class="icon-boxes">
      <div class="container">

        <div class="row justify-content-md-center">

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="dua-layanan">
              <h4><a style="color: #f1f8ff" href="#">JDIH</a></h4>
              <p class="satu-baris">Jaringan Dokumentasi dan Informasi Hukum</p>
            </div>
        </div>

        <div class="col-6" data-aos="fade-up" data-aos-delay="100">
          <div class="dua-layanan" style="background-color: rgb(36, 36, 36);">
            <h4><a style="color: #f1f8ff" href="#">PPID</a></h4>
            <p class="satu-baris">(Badan publik dapat mempublikasi informasi yang dikuasai yang selanjutnya tersusun sebagai DIP secara otomatis.)</p>
          </div>
        </div>

      </div>
    </div>
    </section> --}}

     <!-- ======= Recent Blog Posts Section ======= -->
     <section id="recent-blog-posts" class="recent-blog-posts mt-5" style="background: #f1f8ff">

      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Berita</h2>
          <p>Berita yang baru ditambahkan</p>
        </div>

        <div class="row">

          @foreach ($posts as $post)
          <div class="col-lg-3" data-aos="fade-up" data-aos-delay="200">
            <div class="post-box">
              <div class="post-img"><img src="{{ $post->image}}" class="img-fluid" alt=""></div>
              <div class="meta">
                <span class="post-date">{{ \Carbon\Carbon::parse($post->created_at)->diffForhumans() }}</span>
                <span class="post-author"> / {{ $post->user->name }}</span>
              </div>
              <h3 class="post-title-recent">{{ $post->title }} </h3>
              <p class="recent-blog-body">{{ strip_tags($post->body) }}</p>
              <a href="{{ route('berita-detail',$post->id) }}" class="readmore stretched-link"><span>Baca</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
          @endforeach

        </div>

      </div>

    </section><!-- End Recent Blog Posts Section -->
    @forelse ($events as $item)
    @include('opd.detail.agenda')
    @empty
    @endforelse

    @include('opd.detail.infografis')

    @include('opd.detail.contact')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    @include('opd.layout.footer')
  </footer><!-- End Footer -->

  <!-- <div id="preloader"></div> -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  @include('opd.layout.script')

</body>

</html>
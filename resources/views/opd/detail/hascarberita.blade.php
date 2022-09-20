<!DOCTYPE html>
<html lang="en">

<head>
  @include('opd.layout.head')
</head>

<body>
    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="fixed-top d-flex align-items-center topbar-inner-pages">
      <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">info@example.com</a>
          <i class="bi bi-phone-fill phone-icon"></i> +1 5589 55488 55
        </div>
        <div class="cta d-none d-md-block">
          <a href="#about" class="scrollto">Get Started</a>
        </div>
      </div>
    </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-inner-pages">
    @include('opd.layout.header')
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Berita</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Berita</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            @forelse ($posts as $post)
            <article class="entry">

              <div class="entry-img">
                <img src="{{ $post->image}}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a class="recent-blog-body" href="blog-single.html">{{ $post->title }}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">{{ $post->user->name }}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{ \Carbon\Carbon::parse($post->created_at)->diffForhumans() }}</time></a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p class="recent-blog-body">
                  {!! \Illuminate\Support\Str::limit(nl2br($post->body), 200,'...') !!}
                </p>
                <div class="read-more">
                  <a href="{{ route('berita-detail',$post->id) }}">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->

            @empty

            <p>Berita Tidak Ditemukan</p>

            @endforelse

            {{-- <div class="blog-pagination">
              <ul class="justify-content-center">
                {!! $posts->links('layouts.pagination') !!}
              </ul>
            </div> --}}

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Cari</h3>
              <div class="sidebar-item search-form">
                <form action="{{ ('/berita-cari') }}" method="GET">
                    <input style="border: none;" type="text" name="cari" value="{{ request()->get('cari') }}">
                    <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                  @foreach ($kategori as $cat)
                  <li><a href="#">{{ $cat->name }} <span>({{ $cat->news->count() }})</span></a></li>
                  @endforeach
                </ul>
              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
                @foreach ($sidebar as $side)
                <div class="post-item clearfix">
                  <img src="{{$side->image}}" alt="">
                  <h4 class="recent-blog-body"><a href="{{ route('berita-detail',$side->id) }}">{{$side->title}}</a></h4>
                  <time datetime="2020-01-01">{{ \Carbon\Carbon::parse($post->created_at)->diffForhumans() }}</time>
                </div>
                @endforeach
              </div><!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  @foreach ($tags as $tag)
                  <li><a href="#">{{$tag->name}}</a></li>
                  @endforeach
                </ul>
              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    @include('opd.layout.footer')
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  @include('opd.layout.script')

</body>

</html>
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

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
        </ol>
        <h2>Berita detail</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry">

              <div class="entry-img">
                <img src="{{$posts->image}}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.html">{{$posts->title}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">{{$posts->user->name}}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{ \Carbon\Carbon::parse($posts->created_at)->diffForhumans() }}</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a href="blog-single.html">{{views($posts)->count()}}</a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                  {!! nl2br(($posts->body)) !!}
                </p>
              </div>

            </article><!-- End blog entry -->

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

              <h3 class="sidebar-title">Kategori</h3>
              <div class="sidebar-item categories">
                <ul>
                  @foreach ($kategori as $cat)
                  <li><a href="{{ route('cari-kategori', $cat->id) }}">{{ $cat->name }} <span>({{ $cat->news->count() }})</span></a></li>
                  @endforeach
                </ul>
              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
                @foreach ($sidebar as $side)
                <div class="post-item clearfix">
                  <img src="{{$side->image}}" alt="">
                  <h4><a href="{{ route('berita-detail',$side->id) }}">{{$side->title}}</a></h4>
                  <time datetime="2020-01-01">{{ \Carbon\Carbon::parse($side->created_at)->diffForhumans() }}</time>
                </div>
                @endforeach

              </div><!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  @foreach($tags as $tag)
                  <li><a href="{{ route('cari-tag', $cat->id) }}">{{$tag->name}}</a></li>
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
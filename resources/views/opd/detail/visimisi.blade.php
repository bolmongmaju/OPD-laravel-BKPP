{{-- <!DOCTYPE html>
<html lang="en">

<head>
    @include('opd.layout.head')
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    @include('opd.layout.header')
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Visi dan Misi</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Visi dan Misi</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team ">
      <div class="container">


          <div class="col-lg-12">
            <div class="member d-flex align-items-start">
              <div class="member-info">
                <h4>Visi</h4>
                @forelse($visimisi as $item)
                <p>{!! nl2br(($item->visi)) !!}</p>
                @empty
                <p>Belum di isi</p>
                @endforelse
              </div>
            </div>

            <br>

            <div class="member d-flex align-items-start">
              <div class="member-info">
                <h4>Misi</h4>
                @forelse($visimisi as $item)
                <p>{!! nl2br(($item->misi)) !!}</p>
                @empty
                <p>Belum di isi</p>
                @endforelse
              </div>
            </div>
          </div>

       

      </div>
    </section><!-- End Team Section -->

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
 --}}















 <!DOCTYPE html>
 <html lang="en">
 
 <head>
   @include('opd.layout.head')
 </head>
 
 <body>
 
   <!-- ======= Top Bar ======= -->
   {{-- <div id="topbar" class="fixed-top d-flex align-items-center topbar-inner-pages">
     <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
       <div class="contact-info d-flex align-items-center">
         <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">info@example.com</a>
         <i class="bi bi-phone-fill phone-icon"></i> +1 5589 55488 55
       </div>
       <div class="cta d-none d-md-block">
         <a href="#about" class="scrollto">Get Started</a>
       </div>
     </div>
   </div> --}}
 
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
         <h2>Visi dan Misi</h2>
 
       </div>
     </section><!-- End Breadcrumbs -->

         <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Visi</h2>
        </div>

        <div class="row content">
          <div class="col-lg-12">
            @forelse($visimisi as $item)
            <p>
              {!! nl2br(($item->visi)) !!}
            </p>
            @empty
              Visi belum diisi
            @endforelse
          </div>
        </div>

        <div class="section-title mt-5">
          <h2>Misi</h2>
        </div>

        <div class="row content">
          <div class="col-lg-12">
            @forelse($visimisi as $item)
            <p>
              {!! nl2br(($item->misi)) !!}
            </p>
            @empty
              Misi belum diisi
            @endforelse
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->
 
    
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
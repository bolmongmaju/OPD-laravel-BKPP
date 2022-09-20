
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
         <h2>Gambar</h2>
 
       </div>
     </section><!-- End Breadcrumbs -->

         <!-- ======= About Us Section ======= -->
<!-- ======= Portfoio Section ======= -->
<section id="portfolio" class="portfoio">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Gambar</h2>
      {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
    </div>

    <div class="row portfolio-container">

      @forelse($foto as $item)
      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <img src="{{ Storage::url('public/photo-images/'. $item->image) }}" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>{{$item->caption}}</h4>
          <p>{{$item->caption}}</p>
          <a href="{{ Storage::url('public/photo-images/'. $item->image) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
          <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
        </div>
      </div>
      @empty
      Belum ada gambar
      @endforelse

    </div>

  </div>
</section><!-- End Portfoio Section -->
 
    
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
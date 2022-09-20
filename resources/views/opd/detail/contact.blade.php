<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Kontak Kami</h2>
      </div>

      <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

        <div class="col-lg-5">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Alamat:</h4>
              <p>{{ $contact->alamat ?? null != null ? $contact->alamat : 'Belum diisi' }}</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>{{ $contact->email ?? null != null ? $contact->email : 'Belum diisi' }}</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Telepon/Whatsapp:</h4>
              <p>{{ $contact->no_telp ?? null != null ? $contact->no_telp : 'Belum diisi' }}</p>
            </div>

            <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Jam Kantor:</h4>
                <p>{{ $contact->hai_kerja ?? null != null ? $contact->hari_kerja : '' }} Pukul {{ $contact->jam_buka ?? null != null ? $contact->jam_buka : '' }} - {{ $contact->jam_tutup ?? null != null ? $contact->jam_tutup : '' }} WITA</p>
              </div>

          </div>

        </div>

        <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">
            <div>
            {!! $contact->maps ?? null != null ? $contact->maps : 'Belum diisi' !!}
            </div>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->
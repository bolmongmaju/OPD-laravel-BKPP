<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-4 col-md-6 footer-links">
        <h4>Link Terkait</h4>
        <ul>
          @forelse ($links as $link)
          <li><i class="bx bx-chevron-right"></i> <a href="{{ $link->url }}" target="_blank">{{ $link->name }}</a></li>
          @empty
          <li><i class="bx bx-chevron-right"></i> <a href="#">isi dengan link terkait</a></li>
          @endforelse
        </ul>
      </div>

      <div class="col-lg-4 col-md-6 footer-links">
        <h4>Layanan</h4>
        <ul>
          @forelse ($services as $service)
          <li><i class="bx bx-chevron-right"></i> <a href="{{ $service->link }}" target="_blank">{{ $service->nama }}</a></li>
          @empty
          <li><i class="bx bx-chevron-right"></i> <a href="#">isi dengan layanan</a></li>
          @endforelse
        </ul>
      </div>

      {{-- <div class="col-lg-3 col-md-6 footer-contact">
        <h4>Visitor</h4>
        <p>
          <strong>Phone:</strong> +1 5589 55488 55<br>
          <strong>Email:</strong> info@example.com<br>
        </p>

      </div> --}}

      <div class="col-lg-4 col-md-6 footer-info">
        <h3>Hubungi Kami</h3>
        <p>{{ $contact->alamat ?? null }} <br><br>
          <strong>Phone:</strong> {{ $contact->no_telp ?? null }}<br>
          <strong>Email:</strong> {{ $contact->email ?? null }}<br>
        </p>
        <div class="social-links mt-3">
          @forelse ($sosmeds as $sosmed)
          <a href="{{ $sosmed->url }}" target="_blank" class="{{ $sosmed->name }}"><i class="{{ $sosmed->icon }}"></i></a>
          @empty
          <p>isi dengan sosial media</p>
          @endforelse
        </div>
      </div>

    </div>
  </div>
</div>

<div class="container">
  <div class="copyright">
    &copy; Copyright {{ date('Y') }} <strong><span>{{ $profil->short_name ?? null != null ? Str::upper($profil->short_name) : '' }}</span></strong>. All Rights Reserved
  </div>
  <div class="credits">
    Designed by <a href="https://diskominfo.go.id/">Diskominfo Bolaang Mongondow</a>
  </div>
</div>
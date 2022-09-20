
<div class="d-flex align-items-center justify-content-between" style="margin-right: 10%; margin-left:10%;">

  <a href="{{ ('/') }}" class="logo"><img src="{{ $profil->logo ?? null != null ? Storage::url($profil->logo) : '' }}" alt="Logo" class="img-fluid"></a>
  <!-- Uncomment below if you prefer to use text as a logo -->
  

  <nav id="navbar" class="navbar">
    <ul>
      <li><a class="nav-link scrollto " href="{{ ('/') }}" class="{{ (request()->is('/')) ? 'active' : '' }}">Home</a></li>
      <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
          <li><a class="{{ (request()->is('struktur')) ? 'active' : '' }}" href="{{ ('/struktur') }}">Struktur Organisasi</a></li>
          <li><a class="{{ (request()->is('visi-misi')) ? 'active' : '' }}" href="{{ ('/visi-misi') }}">Visi dan Misi</a></li>
          <li><a class="{{ (request()->is('tupoksi')) ? 'active' : '' }}" href="{{ ('tupoksi') }}">Tupoksi</a></li>
          <li><a class="{{ (request()->is('program-dan-kegiatan')) ? 'active' : '' }}" href="{{ ('program-dan-kegiatan') }}">Program dan Kegiatan</a></li>
          <li><a class="{{ (request()->is('daftar-pegawai')) ? 'active' : '' }}" href="{{ ('daftar-pegawai') }}">Daftar Pegawai</a></li>
        </ul>
      </li>
      <li><a href="{{ ('/berita') }}" class="{{ (request()->is('/berita')) ? 'active' : '' }}">Berita</a></li>
      <li class="dropdown"><a href="#"><span>Galeri</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
          <li><a class="{{ (request()->is('foto')) ? 'active' : '' }}" href="{{ ('foto') }}">Gambar</a></li>
          <li><a class="{{ (request()->is('video')) ? 'active' : '' }}" href="{{ ('video') }}">Video</a></li>
        </ul>
      </li>
      <li><a class="nav-link scrollto " href="{{ ('/download') }}" class="{{ (request()->is('/download')) ? 'active' : '' }}">File/Dokumen</a></li>
      <li><a class="nav-link scrollto " href="#contact" class="{{ (request()->is('#contact')) ? 'active' : '' }}">Kontak</a></li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
  </nav>

  <h1 class="logo"><a href="{{ ('/') }}">{{ $profil->short_name ?? null != null ? Str::upper($profil->short_name) : '' }}</a></h1>

</div>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>{{ $profil->nama_opd ?? null != null ? Str::title($profil->nama_opd) : '' }} Kabupaten Bolaang Mongondow</title>
<meta content="{{ $profil->nama_opd ?? null != null ? Str::title($profil->nama_opd) : '' }} Kabupaten Bolaang Mongondow" name="description">
<meta content="{{ $profil->nama_opd ?? null != null ? Str::title($profil->nama_opd) : '' }}, {{ $profil->short_name ?? null != null ? Str::title($profil->short_name) : '' }}, bolaang mongondow, opd, skpd" name="keywords">

<!-- Favicons -->
<link href="{{ $profil->favicon ?? null != null ? Storage::url($profil->favicon) : '' }}" rel="icon">
<link href="{{ $profil->favicon ?? null != null ? Storage::url($profil->favicon) : '' }}" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">


<!-- Vendor CSS Files -->
<link href="{{ asset('assets-opd/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets-opd/vendor/aos/aos.css" rel="stylesheet') }}">
<link href="{{ asset('assets-opd/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets-opd/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('assets-opd/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets-opd/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets-opd/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
<link href="{{ asset('assets-opd/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="{{ asset('assets-opd/css/style.css') }}" rel="stylesheet">
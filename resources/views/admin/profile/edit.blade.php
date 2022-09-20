@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Profile</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-user"></i> Edit Profile</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>NAMA Lengkap OPD</label>
                            <input type="text" name="nama" value="{{ old('nama') ?? $profile->nama_opd }}"
                                placeholder="Masukkan Nama Lengkap OPD"
                                class="form-control @error('nama') is-invalid @enderror">

                            @error('nama')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>NAMA Pendek OPD</label>
                            <input type="text" name="short_name" value="{{ old('short_name') ?? $profile->short_name }}"
                                placeholder="Masukkan Nama Singkatan OPD"
                                class="form-control @error('short_name') is-invalid @enderror">

                            @error('short_name')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>LOGO</label>
                            <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">

                            @error('logo')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror

                            @if(Storage::disk('public')->exists($profile->logo ?? null))
                                <img src="{{ Storage::url($profile->logo ?? null) }}" width="200px" />
                            @endif
                        </div>

                        <div class="form-group">
                            <label>FAVICON</label>
                            <input type="file" name="favicon" class="form-control @error('favicon') is-invalid @enderror">

                            @error('favicon')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror

                            @if(Storage::disk('public')->exists($profile->favicon ?? null))
                                <img src="{{ Storage::url($profile->favicon ?? null) }}" width="200px" />
                            @endif
                        </div>

                        <div class="form-group">
                            <label>STRUKTUR ORGANISASI</label>
                            <input type="file" name="struktur" class="form-control @error('struktur') is-invalid @enderror">

                            @error('struktur')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror

                            @if(Storage::disk('public')->exists($profile->struktur_organisasi ?? null))
                                <img src="{{ Storage::url($profile->struktur_organisasi ?? null) }}" width="200px" />
                            @endif
                        </div>

                        <div class="form-group">
                            <label>VISI</label>
                            <textarea class="form-control content @error('visi') is-invalid @enderror" name="visi"
                                placeholder="Masukkan Visi" rows="10">{!! old('visi') ?? $profile->visi !!}</textarea>
                            @error('visi')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>MISI</label>
                            <textarea class="form-control content @error('misi') is-invalid @enderror" name="misi"
                                placeholder="Masukkan Misi" rows="10">{!! old('misi') ?? $profile->misi !!}</textarea>
                            @error('misi')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label>DAFTAR PEGAWAI</label>
                            <textarea class="form-control content @error('pegawai') is-invalid @enderror" name="pegawai"
                                placeholder="Masukkan Daftar Pegawai" rows="10">{!! old('pegawai') ?? $profile->pegawai !!}</textarea>
                            @error('pegawai')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div> --}}

                        <div class="form-group">
                            <label>TUPOKSI</label>
                            <textarea class="form-control content @error('tupoksi') is-invalid @enderror" name="tupoksi"
                                placeholder="Masukkan Tupoksi" rows="10">{!! old('tupoksi') ?? $profile->tupoksi !!}</textarea>
                            @error('tupoksi')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>PROGRAM DAN KEGIATAN</label>
                            <textarea class="form-control content @error('program') is-invalid @enderror" name="program"
                                placeholder="Masukkan Program dan Kegiatan" rows="10">{!! old('program') ?? $profile->dasar_hukum !!}</textarea>
                            @error('program')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>DASAR HUKUM</label>
                            <textarea class="form-control content @error('dasar_hukum') is-invalid @enderror" name="dasar_hukum"
                                placeholder="Masukkan Dasar Hukum" rows="10">{!! old('dasar_hukum') ?? $profile->dasar_hukum !!}</textarea>
                            @error('dasar_hukum')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>SEJARAH</label>
                            <textarea class="form-control content @error('sejarah') is-invalid @enderror" name="sejarah"
                                placeholder="Masukkan Sejarah" rows="10">{!! old('sejarah') ?? $profile->sejarah !!}</textarea>
                            @error('sejarah')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>KATA SAMBUTAN</label>
                            <textarea class="form-control content @error('kata_sambutan') is-invalid @enderror" name="kata_sambutan"
                                placeholder="Masukkan Kata Sambutan" rows="10">{!! old('kata_sambutan') ?? $profile->kata_sambutan !!}</textarea>

                            @error('kata_sambutan')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>FOTO PIMPINAN</label>
                            <input type="file" name="foto_pimpinan" class="form-control @error('foto_pimpinan') is-invalid @enderror">

                            @error('foto_pimpinan')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror

                            @if(Storage::disk('public')->exists($profile->foto_pimpinan ?? null))
                                <img src="{{ Storage::url($profile->foto_pimpinan ?? null) }}" width="200px" />
                            @endif
                        </div>

                        <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                            UPDATE</button>
                        <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.6.2/tinymce.min.js"></script>
<script>
    var editor_config = {
        selector: "textarea.content",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        forced_root_block : false,
    };

    tinymce.init(editor_config);

</script>
@stop

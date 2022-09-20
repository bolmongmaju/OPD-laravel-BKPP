@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Profile</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-user"></i> Tambah Profile</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.profile.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>NAMA PANJANG OPD</label>
                            <input type="text" name="nama" value="{{ old('nama') }}"
                                placeholder="Masukkan Nama Lengkap OPD"
                                class="form-control @error('nama') is-invalid @enderror">

                            @error('nama')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>NAMA PENDEK OPD</label>
                            <input type="text" name="short_name" value="{{ old('short_name') }}"
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
                        </div>

                        <div class="form-group">
                            <label>FAVICON</label>
                            <input type="file" name="favicon" class="form-control @error('favicon') is-invalid @enderror">

                            @error('favicon')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>STRUKTUR ORGANISASI</label>
                            <input type="file" name="struktur" class="form-control @error('struktur') is-invalid @enderror">

                            @error('struktur')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>VISI</label>
                            <textarea class="form-control content @error('visi') is-invalid @enderror" name="visi"
                                placeholder="Masukkan Visi" rows="10">{!! old('visi') !!}</textarea>
                            @error('visi')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>MISI</label>
                            <textarea class="form-control content @error('misi') is-invalid @enderror" name="misi"
                                placeholder="Masukkan Misi" rows="10">{!! old('misi') !!}</textarea>
                            @error('misi')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label>DAFTAR PEGAWAI</label>
                            <textarea class="form-control content @error('pegawai') is-invalid @enderror" name="pegawai"
                                placeholder="Masukkan Daftar Pegawai" rows="10">{!! old('pegawai') !!}</textarea>
                            @error('pegawai')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div> --}}

                        <div class="form-group">
                            <label>TUPOKSI</label>
                            <textarea class="form-control content @error('tupoksi') is-invalid @enderror" name="tupoksi"
                                placeholder="Masukkan Tupoksi" rows="10">{!! old('tupoksi') !!}</textarea>
                            @error('tupoksi')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>PROGRAM DAN KEGIATAN</label>
                            <textarea class="form-control content @error('dasar_hukum') is-invalid @enderror" name="program"
                                placeholder="Masukkan Program dan Kegiatan" rows="10">{!! old('program') !!}</textarea>
                            @error('program')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>DASAR HUKUM</label>
                            <textarea class="form-control content @error('dasar_hukum') is-invalid @enderror" name="dasar_hukum"
                                placeholder="Masukkan Dasar Hukum" rows="10">{!! old('dasar_hukum') !!}</textarea>
                            @error('dasar_hukum')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>SEJARAH</label>
                            <textarea class="form-control content @error('sejarah') is-invalid @enderror" name="sejarah"
                                placeholder="Masukkan Sejarah" rows="10">{!! old('sejarah') !!}</textarea>
                            @error('sejarah')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>KATA SAMBUTAN</label><br>
                            <textarea class="form-control content @error('kata_sambutan') is-invalid @enderror" name="kata_sambutan"
                                placeholder="Masukkan Kata Sambutan" rows="10">{!! old('kata_sambutan') !!}</textarea>
                            @error('sejarah')
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
                        </div>

                        <div class="form-group">
                            <label>MAKLUMAT PELAYANAN (Opsional)</label>
                            <input type="file" name="maklumat" class="form-control @error('maklumat') is-invalid @enderror">

                            @error('maklumat')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                            SIMPAN</button>
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

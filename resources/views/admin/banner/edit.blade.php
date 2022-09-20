@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Banner</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-image"></i> Edit Banner</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.banner.update',$banner->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Posisi</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name="posisi" id="posisi">
                                        <option value="">-- PILIH POSISI --</option>
                                @foreach ($banners as $b)
                                    @if($banner->position == $b)
                                        <option value="{{ $banner->position  }}" selected>{{ $banner->position }}</option>
                                    @else
                                        <option value="{{ $b }}">{{ $b }}</option>
                                    @endif
                                @endforeach
                                    </select>
                                </div>
                                @error('posisi')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Link:</strong>
                                <input type="text" name="link" class="form-control" value="{{ $banner->link }}">
                                @error('link')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Image:</strong>
                                <input type="file" name="image" class="form-control" placeholder="image">
                                <img src="{{ $banner->image }}" width="300px" style="padding-top: 20px;">
                                @error('image')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-light" href="{{ route('admin.banner.index') }}">Cancel</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@stop

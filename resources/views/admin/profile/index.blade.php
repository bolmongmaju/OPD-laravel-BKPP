@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profil</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-user"></i> Profil</h4>
                </div>

                <div class="card-body">
                    @can('profile.create')
                        <div class="input-group-prepend">
                            <a href="{{ route('admin.profile.create') }}" id="btnProfile" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                        </div>
                    @endcan
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">NAMA OPD</th>
                                <th scope="col">SHORT NAME</th>
                                <th scope="col">FOTO PIMPINAN</th>
                                <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($profiles as $profile)
                                <tr>
                                    <td>{{ $profile->nama_opd }}</td>
                                    <td>{{ $profile->short_name }}</td>
                                    <td>
                                        @if(Storage::disk('public')->exists($profile->foto_pimpinan ?? null))

                                        <img src="{{ Storage::url($profile->foto_pimpinan ?? null) }}" width="100px" alt="Foto Pimpinan" />
                                        @endif
                                    </td>
                                    <td class="text-center">

                                        @can('profile.edit')
                                            <a href="{{ route('admin.profile.edit', $profile->id) }}" class="btn btn-sm btn-warning">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="4">Empty</td>
                            </tr>
                            @endforelse
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

<script>
    
</script>
@stop
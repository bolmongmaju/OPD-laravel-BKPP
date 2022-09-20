@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Contact</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-phone"></i> Contact</h4>
                </div>

                <div class="card-body">
                    @can('contact.create')
                        <div class="input-group-prepend">
                            <a href="{{ route('admin.contact.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                        </div>
                    @endcan

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">EMAIL</th>
                                <th scope="col">NO TELP</th>
                                <th scope="col">ALAMAT</th>
                                <th scope="col">JAM KERJA</th>
                                <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->no_telp }}</td>
                                    <td>{{ $contact->alamat }}</td>
                                    <td>{{ $contact->hari_kerja }}, <br>Jam {{ $contact->jam_buka }} - {{ $contact->jam_tutup }} WITA</td>
                                    <td class="text-center">

                                    @can('contact.edit')
                                        <a href="{{ route('admin.contact.edit', $contact->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                    @endcan
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="5">Empty</td>
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
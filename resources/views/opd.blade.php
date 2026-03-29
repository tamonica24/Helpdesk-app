@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'OPD')
@section('content_header_title', 'Dashboard')
@section('content_header_subtitle', 'Perangkat Daerah')

{{-- Content body: main page content --}}

@section('content_body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('opd.create') }}" class="btn-primary">
                        <i class="fa fa-plus"></i> Tambah Data
                    </a>
                </div>
                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <x-adminlte-datatable id="opd-table" :heads="['NO.', 'Kode', 'Nama', 'Status', 'Aksi']" :config="['paging' => true]">
                        @foreach ($data as $opd)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $opd->kode_opd }}</td>
                                <td>{{ $opd->nama_opd }}</td>
                                <td>{{ $opd->is_active }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('opd.edit', $opd->id) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('opd.destroy', $opd->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"
                                                class="btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
            </div>
        </div>
    @stop

    {{-- Push extra CSS --}}

    @push('css')
        {{-- Add here extra stylesheets --}}
        {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    @endpush

    {{-- Push extra scripts --}}

    @section('plugins.Datatables', true)

    @push('js')
        <script>
            console.log("Hi, I'm using the Laravel-AdminLTE package!");
        </script>
    @endpush

@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Edit Data OPD')
@section('content_header_title', 'OPD')
@section('content_header_subtitle', 'Tambah Data Perangkat Daerah')

{{-- Content body: main page content --}}

@section('content_body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('opd') }}" clas="btn btn-secondary">
                        <i class="fa-arrow-left"></i> Kembali
                    </a>
                </div>
                <div class="card-body"></div>
                <form action="{{ route('opd.update', $instansi->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="kode_opd">Kode_OPD</label>
                        <input type="text" value="{{ $instansi->kode_opd }}" name="kode_opd" id="kode_opd"
                            class="form-control" @error('kode_opd') is-invalid
                        @enderror"
                            value="{{ old('kode_opd') }}" placeholder="Masukkan kode OPD">
                        @error('kode_opd')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_opd">Nama OPD</label>
                        <input type="text" value="{{ $instansi->nama_opd }}" name="nama_opd" id="kode_opd"
                            class="form-control" @error('nama_opd') is-invalid
                        @enderror"
                            value="{{ old('nama_opd') }}" placeholder="Masukkan nama OPD">
                        @error('nama_opd')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="is_active">Status</label>
                        <select name="is_active" id="is_active"
                            class="form-control @error('is_active') is-invalid @enderror">
                            <option value="">Pilih status</option>
                            <option value="1" {{ $instansi->is_active == '1' ? 'selected' : '' }}>Aktif
                            </option>
                            <option value="0" {{ $instansi->is_active == '1' ? 'selected' : '' }}>Tidak Aktif
                            </option>
                        </select>
                        @error('is_active')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Simpan Perubahan</button>
                    <button type="reset" class="btn btn-danger"><i class="fa fa-close"></i> Reset</button>
            </div>
        </div>
    </div>
    </div>
@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{--
<link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@endpush

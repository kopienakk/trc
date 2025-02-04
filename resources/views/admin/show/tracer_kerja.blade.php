@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Tracer Kerja</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $tracerKerja->id_tracer_kerja }}</td>
        </tr>
        <tr>
            <th>Nama Alumni</th>
            <td>{{ $tracerKerja->id_alumni }}</td>
        </tr>
        <tr>
            <th>Perusahaan</th>
            <td>{{ $tracerKerja->tracer_kerja_pekerjaan }}</td>
        </tr>
        <tr>
            <th>Perusahaan</th>
            <td>{{ $tracerKerja->tracer_kerja_nama }}</td>
        </tr>
        <tr>
            <th>Perusahaan</th>
            <td>{{ $tracerKerja->tracer_kerja_jabatan }}</td>
        </tr>
        <tr>
            <th>Perusahaan</th>
            <td>{{ $tracerKerja->tracer_kerja_status }}</td>
        </tr>
        <tr>
            <th>Perusahaan</th>
            <td>{{ $tracerKerja->tracer_kerja_lokasi }}</td>
        </tr>
        <tr>
            <th>Perusahaan</th>
            <td>{{ $tracerKerja->tracer_kerja_alamat }}</td>
        </tr>
        <tr>
            <th>Perusahaan</th>
            <td>{{ $tracerKerja->tracer_kerja_tgl_mulai }}</td>
        </tr>
        <tr>
            <th>Perusahaan</th>
            <td>{{ $tracerKerja->tracer_kerja_gaji }}</td>
        </tr>
        
    </table>
</div>
@endsection

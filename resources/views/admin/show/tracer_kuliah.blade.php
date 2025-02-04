@extends('layouts.app')

@section('content')
<div class="container">
    
    <h1>Detail Tracer Kuliah</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $tracerKuliah->id_tracer_kuliah }}</td>
        </tr>
        <tr>
            <th>Nama Alumni</th>
            <td>{{ $tracerKuliah->id_alumni }}</td>
        </tr>
        <tr>
            <th>Nama Universitas</th>
            <td>{{ $tracerKuliah->tracer_kuliah_kampus }}</td>
        </tr>
        <tr>
            <th>Program Studi</th>
            <td>{{ $tracerKuliah->tracer_kuliah_status }}</td>
        </tr>
        <tr>
            <th>Tahun Masuk</th>
            <td>{{ $tracerKuliah->tracer_kuliah_jenjang }}</td>
        </tr>
        <tr>
            <th>Tahun Masuk</th>
            <td>{{ $tracerKuliah->tracer_kuliah_jurusan }}</td>
        </tr>
        <tr>
            <th>Tahun Masuk</th>
            <td>{{ $tracerKuliah->tracer_kuliah_linier }}</td>
        </tr>
        <tr>
            <th>Tahun Masuk</th>
            <td>{{ $tracerKuliah->tracer_kuliah_alamat }}</td>
        </tr>
    </table>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="container-box">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Sistem Tracer Study</h1>
        <p class="text-gray-600 text-center mb-4">Selamat datang di sistem tracer study alumni. Pilih kategori:</p>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <a href="{{ route('alumni.index') }}" class="btn btn-blue">Data Alumni</a>
            <a href="{{ route('tracer.kuliah.index') }}" class="btn btn-green">Tracer Kuliah</a>
            <a href="{{ route('tracer.kerja.index') }}" class="btn btn-yellow">Tracer Kerja</a>
            <a href="{{ route('testimoni.index') }}" class="btn btn-purple">Testimoni Alumni</a>
        </div>
    </div>
</div>
@endsection

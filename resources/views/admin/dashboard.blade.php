@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-[#EEEEEE]">
    <div class="container-box bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-center text-[#3B1E54] mb-6">Sistem Tracer Study</h1>
        <p class="text-[#9B7EBD] text-center mb-4">Selamat datang di sistem tracer study alumni. Pilih kategori:</p>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <a href="/tambahdata" class="btn transition-transform transform hover:scale-105 hover:bg-[#E2A9D3] p-4 text-center rounded-lg" style="background-color: #9B7EBD;">Tambah Pilihan Data</a>
            <a href="{{ route('admin.alumni') }}" class="btn transition-transform transform hover:scale-105 hover:bg-[#C17D9F] p-4 text-center rounded-lg" style="background-color: #9B7EBD;">Data Alumni</a>
            <a href="{{ route('tracer.kuliah.index') }}" class="btn transition-transform transform hover:scale-105 hover:bg-[#5B2C6F] p-4 text-center rounded-lg" style="background-color: #9B7EBD;">Tracer Kuliah</a>
            <a href="{{ route('tracer.kerja.index') }}" class="btn transition-transform transform hover:scale-105 hover:bg-[#E2A9D3] p-4 text-center rounded-lg" style="background-color: #9B7EBD;">Tracer Kerja</a>
            <a href="{{ route('testimoni.index') }}" class="btn transition-transform transform hover:scale-105 hover:bg-[#C17D9F] p-4 text-center rounded-lg" style="background-color: #9B7EBD;">Testimoni Alumni</a>
        </div>
    </div>
</div>


<style>
    :root {
        --primary: #9B7EBD;
        --secondary: #3B1E54;
        --accent: #D4BEE4;
        --light: #EEEEEE;
    }
    a{
        text-decoration: none;

    }
    a:hover{:
        color: var(--secondary);
    }

    .container-box {
        background-color: var(--accent);
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .btn {
        display: block;
        text-align: center;
        padding: 10px;
        border-radius: 8px;
        font-weight: bold;
        transition: background 0.3s;
        color: var(--light);
        margin: 5px;
    }

    .btn-blue {
        background-color: var(--primary);
    }

    .btn-green {
        background-color: #4CAF50;
    }

    .btn-yellow {
        background-color: #FFC107;
    }

    .btn-purple {
        background-color: var(--secondary);
    }

    .btn:hover {
        opacity: 0.8;
    }
</style>


@endsection
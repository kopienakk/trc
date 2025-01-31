@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-xl font-bold mb-6">Form Data Alumni</h1>
    <form action="{{ route('alumni.save') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $alumni->id ?? '' }}">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="nisn">NISN</label>
                <input type="text" name="nisn" id="nisn" value="{{ $alumni->nisn ?? '' }}" class="form-input w-full">
            </div>
            <div>
                <label for="nik">NIK</label>
                <input type="text" name="nik" id="nik" value="{{ $alumni->nik ?? '' }}" class="form-input w-full">
            </div>
            <div>
                <label for="nama_depan">Nama Depan</label>
                <input type="text" name="nama_depan" id="nama_depan" value="{{ $alumni->nama_depan ?? '' }}"
                    class="form-input w-full">
            </div>
            <div>
                <label for="nama_belakang">Nama Belakang</label>
                <input type="text" name="nama_belakang" id="nama_belakang" value="{{ $alumni->nama_belakang ?? '' }}"
                    class="form-input w-full">
            </div>
            <!-- Field lainnya -->
        </div>
        <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
    </form>
</div>
@endsection
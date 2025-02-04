@extends('layouts.app')

@section('content')
    <div class="table-container">
        <table class="table" cellspacing="0" border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Alumni</th>
                    <th>Nama Pekerjaan</th>
                    <th>Nama Perusahaan</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                    <th>Lokasi</th>
                    <th>Alamat</th>
                    <th>Tanggal Mulai</th>
                    <th>Gaji</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tracerKerja as $key => $kerja)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $kerja->alumni ? $kerja->alumni->nama_depan . ' ' . $kerja->alumni->nama_belakang : 'Tidak Ditemukan' }}</td>
                        <td>{{ $kerja->tracer_kerja_pekerjaan }}</td>
                        <td>{{ $kerja->tracer_kerja_nama }}</td>
                        <td>{{ $kerja->tracer_kerja_jabatan }}</td>
                        <td>{{ $kerja->tracer_kerja_status }}</td>
                        <td>{{ $kerja->tracer_kerja_lokasi }}</td>
                        <td>{{ $kerja->tracer_kerja_alamat }}</td>
                        <td>{{ $kerja->tracer_kerja_tgl_mulai }}</td>
                        <td>{{ $kerja->tracer_kerja_gaji }}</td>
                        <td>
                            <form action="{{ route('admin.tracer-kuliah.delete', $kerja->id_tracer_kerja) }}" class="form-hapus" style="display:inline;" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="confirmDelete(this)">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
@endsection
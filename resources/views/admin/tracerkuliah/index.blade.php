@extends('layouts.app')

@section('content')

    <div class="table-container">
        <table class="table" cellspacing="0" border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Alumni</th>
                    <th>Univ</th>
                    <th>Status</th>
                    <th>Jenjang</th>
                    <th>Jurusan</th>
                    <th>Linier</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tracerKuliah as $key => $kuliah)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $kuliah->alumni ? $kuliah->alumni->nama_depan . ' ' . $kuliah->alumni->nama_belakang : 'Tidak Ditemukan' }}
                        </td>
                        <td>{{ $kuliah->tracer_kuliah_kampus }}</td>
                        <td>{{ $kuliah->tracer_kuliah_status }}</td>
                        <td>{{ $kuliah->tracer_kuliah_jenjang }}</td>
                        <td>{{ $kuliah->tracer_kuliah_jurusan }}</td>
                        <td>{{ $kuliah->tracer_kuliah_linier }}</td>
                        <td>{{ $kuliah->tracer_kuliah_alamat }}</td>
                        <td>
                            <form action="{{ route('admin.tracer-kuliah.delete', $kuliah->id_tracer_kuliah) }}"
                                class="form-hapus" style="display:inline;" method="POST">
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
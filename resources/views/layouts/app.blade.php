<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tracer Kerja')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #EEEEEE;
            margin: 0;
            padding: 0;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #3B1E54;
            padding: 10px 20px;
        }

        .navbar .left-section,
        .navbar .right-section {
            display: flex;
            align-items: center;
        }

        .navbar .left-section span,
        .navbar .right-section a {
            color: white;
            margin-right: 20px;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .navbar .right-section a:last-child {
            margin-right: 0;
        }

        .navbar .left-section span:hover,
        .navbar .right-section a:hover {
            color: #D4BEE4;
        }

        .container {
            margin: 20px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-danger {
            background-color: #9B7EBD;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #3B1E54;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="left-section">
            <span>Profil</span>
            <span>Nama</span>
        </div>
        <div class="right-section">
            <a href="/tambahdata">Tambah Data</a>
            <a href="/admin/alumni">Data Alumni</a>
            <a href="/tracer-kuliah">Tracer Kuliah</a>
            <a href="/tracer-kerja">Tracer Kerja</a>
            <a href="/testimoni">Testimoni</a>
            <a href="javascript:history.back()">Kembali</a>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="logout">
                    Logout
                </button>
            </form>

        </div>
    </div>

    <!-- Konten halaman -->
    <div class="container">
        @yield('content')
    </div>

</body>

</html>
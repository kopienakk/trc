<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tahun Lulus</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #EEEEEE;
            color: #3B1E54;
            text-align: center;
            padding: 20px;
        }
        .container {
            background-color: #D4BEE4;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            width: 280px;
            margin: auto;
        }
        h3 {
            color: #3B1E54;
            font-size: 18px;
        }
        input {
            width: 95%;
            padding: 8px;
            margin: 8px 0;
            border: 1px solid #3B1E54;
            border-radius: 4px;
            font-size: 14px;
        }
        button {
            background-color: #9B7EBD;
            color: white;
            padding: 8px;
            border: none;
            border-radius: 4px;
            width: 100%;
            font-size: 14px;
            cursor: pointer;
        }
        button:hover {
            background-color: #3B1E54;
        }
        .links {
            margin-top: 10px;
        }
        .links a {
            display: block;
            text-decoration: none;
            color: #3B1E54;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>Tambah Tahun Lulus</h3>
        <form action="{{ route('admin.status-alumni.store') }}" method="POST">
            @csrf
            <input type="text" id="status" name="status" placeholder="Status Alumni" required>
            <button type="submit">Simpan</button>
        </form>
        <div class="links">
        <a href="/tambahdata">Tambah data lain</a>
        <a href="/admin/status-alumni">Daftar status</a>
        </div>
    </div>
</body>

</html>
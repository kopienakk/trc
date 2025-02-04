<!DOCTYPE html>
<html lang="en">
@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pilihan Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #EEEEEE;
            color: #3B1E54;
            text-align: center;
            
        }
        .container {
            background-color: #D4BEE4;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        h1 {
            color: #3B1E54;
        }
        .links {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
        }
        a {
            text-decoration: none;
            background-color: #9B7EBD;
            color: white;
            padding: 10px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        a:hover {
            background-color: #3B1E54;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Pilihan Data</h1>
        <div class="links">
            <a href="/admin/tahun-lulus/tambah">Tahun Lulus</a>
            <a href="/admin/bidang-keahlian/tambah">Bidang Keahlian</a>
            <a href="/admin/program-keahlian/tambah">Program Keahlian</a>
            <a href="/admin/konsentrasi-keahlian/tambah">Konsentrasi Keahlian</a>
            <a href="/admin/status-alumni/create">Status Alumni</a>
        </div>
    </div>
</body>
</html>
@endsection
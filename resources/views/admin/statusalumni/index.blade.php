<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih & Tambah Tahun Lulus</title>
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
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: inline-block;
            width: 300px;
            margin: 20px auto;
        }

        h3 {
            color: #3B1E54;
        }

        select,
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #3B1E54;
            border-radius: 5px;
        }

        button,
        a {
            display: inline-block;
            text-decoration: none;
            background-color: #9B7EBD;
            color: white;
            padding: 7px;
            border-radius: 5px;
            transition: background 0.3s;
            margin-top: 10px;
            width: 50%;
            text-align: center;
        }

        button:hover,
        a:hover {
            background-color: #3B1E54;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>Pilih Status Alumni</h3>
        <select id="id_status_alumni" name="id_status_alumni">
            @foreach($statusAlumni as $status)
                <option value="{{ $status->id_status_alumni }}">{{ $status->status }}</option>
            @endforeach
        </select>
        <a href="/admin/status-alumni/create">Tambah status</a>
    </div>

</html>


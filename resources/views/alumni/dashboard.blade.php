<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #EEEEEE;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #3B1E54;
            color: #FFFFFF;
            padding: 1rem;
            text-align: center;
        }

        .container {
            margin: 2rem auto;
            max-width: 1200px;
            background-color: #FFFFFF;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1.5rem;
        }

        th,
        td {
            border: 1px solid #D4BEE4;
            padding: 0.75rem;
            text-align: left;
        }

        th {
            background-color: #9B7EBD;
            color: #FFFFFF;
        }

        tr:nth-child(even) {
            background-color: #F5EFFF;
        }

        .actions {
            display: flex;
            gap: 0.5rem;
        }

        .actions button {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            color: #FFFFFF;
            cursor: pointer;
        }

        .actions .detail {
            background-color: #3B1E54;
        }

        .actions .delete {
            background-color: #D4BEE4;
        }

        .add-button {
            background-color: #9B7EBD;
            color: #FFFFFF;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: inline-block;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <header>
        <h1>Alumni Dashboard</h1>
    </header>
    <!-- <h3>Selamat datang {{ auth()->user()->nama_depan }}</h3>  -->

    <div class="container">
        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="logout">
                Logout
            </button>
        </form>
        <form action="" {{ route('alumni.data-diri') }}" method="GET"">
            <button class=" detail">Detail diri</button>
        </form>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NISN</th>
                        <th>Program Keahlian</th>
                        <th>Status Alumni</th>
                        <th>Tahun Lulus</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumni as $index => $data)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $data->nama_depan . " " . $data->nama_belakang }}</td>
                            <td>{{ $data->nisn }}</td>
                            <td>{{ $data->konsentrasiKeahlian->konsentrasi_keahlian }}</td>
                            <td>{{ $data->statusAlumni->status }}</td>
                            <td>{{ $data->tahunLulus->tahun_lulus ?? '-' }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</body>

</html>
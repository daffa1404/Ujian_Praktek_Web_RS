<!DOCTYPE html>
<html>

<head>
    <title>Daftar Dokter</title>
    <link rel="stylesheet" href="{{ asset('css/dokter.css') }}">
</head>

<body>
    <header>
        <div class="container nav-container">
            <a href="#" class="logo"><img src="{{ asset('image/kivotoshospital_ba-style@nulla.top.png') }}" width="150" height="150" /></a>
            <nav>
                <ul>
                    <li><a href="{{ url('/') }}">home</a></li>
                    <li><a href="{{ url('/pasien') }}">pasien</a></li>
                    <li><a href="{{ url('/dokter') }}">Dokter</a></li>
                    <li><a href="{{ url('/tindakan') }}">tindakan</a></li>
                    <li><a href="{{ url('/kunjungan') }}">kunjungan</a></li>
                    <li><a href="/detail kunjungan.html">detail kunjungan</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <h1>Daftar Dokter</h1>
    <div class="container">
        <table class="doctor-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nama</th>
                    <th>Spesialis</th>
                    <th>Jadwal</th>
                    <th>no_str</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dokters as $dokter)
                    <tr>
                        <td>{{ $dokter->id }}</td>
                        <td>{{ $dokter->nama }}</td>
                        <td>{{ $dokter->spesialis }}</td>
                        <td>{{ $dokter->jadwal_praktek }}</td>
                        <td>{{ $dokter->no_str }}</td>
                        <td>

                            </form>
                            <form action="{{ url('/dokter/' . $dokter->id) }}" method="POST" style="display:inline;"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>

<html>

<head>
    <title>kunjungan</title>
    <link rel="stylesheet" href="{{ asset('css/tindakan.css') }}">
</head>

<body>
    <header>
        <div class="container nav-container">
            <a href="#" class="logo"><img src="{{ asset('image/kivotoshospital_ba-style@nulla.top.png') }}" width="150"
                    height="150" /></a>
            <nav>
                <ul>
                    <li><a href="{{ url('/') }}">home</a></li>
                    <li><a href="{{ url('/pasien') }}">Pasien</a></li>
                    <li><a href="{{ url('/dokter') }}">Dokter</a></li>
                    <li><a href="{{ url('/tindakan') }}">tindakan</a></li>
                    <li><a href="{{ url('/kunjungan') }}">kunjungan</a></li>
                    <li><a href="/detail kunjungan.html">detail kunjungan</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <h1>Daftar kunjungan</h1>
    <div class="container">
        <table class="tindakan-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>pasien_id</th>
                    <th>dokter_id</th>
                    <th>tanggal</th>
                    <th>keluhan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kunjungans as $kunjungan)
                    <tr>
                    <td>{{ $kunjungan->id }}</td>
                    <td>{{ $kunjungan->pasien_id }}</td>
                    <td>{{ $kunjungan->dokter_id }}</td>
                    <td>{{ $kunjungan->tanggal}}</td>
                    <td>{{ $kunjungan->keluhan }}</td>
                    <td>

                        </form>
                        <form action="{{ url('/kunjungan/' . $kunjungan->id) }}" method="POST" style="display:inline;"
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

<html>

<head>
    <title>tindakan</title>
    <link rel="stylesheet" href="{{ asset('css/tindakan.css') }}">
</head>

<body>
    <header>
        <div class="container nav-container">
            <a href="#" class="logo">
                <img src="{{ asset('image/kivotoshospital_ba-style@nulla.top.png') }}" width="150" height="150" />
            </a>
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

    <h1>Daftar tindakan</h1>
    <div class="container">
        <table class="tindakan-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nama_tindakan</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tindakans as $tindakan)
                    <tr>
                        <td>{{ $tindakan->id }}</td>
                        <td>{{ $tindakan->nama_tindakan }}</td>
                        <td>{{ $tindakan->harga }}</td>
                        <td>
                            <form action="{{ url('/tindakan/' . $tindakan->id) }}" method="POST" style="display:inline;"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>

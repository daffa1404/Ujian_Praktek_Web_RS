<html>

<head>
    <title>pasien Dokter</title>
    <link rel="stylesheet" href="{{ asset('css/pasien.css') }}">
</head>

<body>
    <header>
        <div class="container nav-container">
            <a href="#" class="logo"><img src="{{ asset('image/kivotoshospital_ba-style@nulla.top.png') }}" width="150"
                    height="150" /></a>
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
    <h1>Daftar Pasien</h1>
    <div class="container">
        <table class="pasien-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nama</th>
                    <th>Nik</th>
                    <th>Tgl_lahir</th>
                    <th>Alamat</th>
                    <th>No_hp</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pasiens as $pasien)
                    <tr>
                        <td>{{ $pasien->id }}</td>
                        <td>{{ $pasien->nama }}</td>
                        <td>{{ $pasien->nik }}</td>
                        <td>{{ $pasien->tgl_lahir }}</td>
                        <td>{{ $pasien->alamat }}</td>
                        <td>{{ $pasien->no_hp }}</td>
                        <td>

                            </form> <form action="{{ url('/pasien/' . $pasien->id) }}" method="POST" style="display:inline;"
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

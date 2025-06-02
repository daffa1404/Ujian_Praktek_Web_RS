<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah</title>
    <link rel="stylesheet" href="{{ asset('css/tambah.css') }}">
</head>

<body>

    <section class="form-section">
        <h2>Tambah Data</h2>

        <!-- Form Tambah Pasien -->
        <form action="{{ route('pasien.store') }}" method="POST">
            @csrf

            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" required>

            <label for="nik">NIK</label>
            <input type="text" name="nik" id="nik" required>

            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir" required>

            <label for="alamat">alamat</label>
            <input type="text" name="alamat" id="alamat" required>

            <label for="no_hp">Nomor HP</label>
            <input type="text" name="no_hp" id="no_hp" required>

            <button type="submit">Simpan</button> </form>

        <!-- Form Tambah Dokter -->
        <form action="/dokter" method="POST" class="data-form">
            @csrf
            <h3>Tambah Dokter</h3>
            <input type="text" name="nama" placeholder="Nama Dokter" required />
            <input type="text" name="spesialis" placeholder="Spesialis" required />
            <input type="text" name="jadwal_praktek" placeholder="Jadwal Praktek" required />
            <input type="text" name="no_str" placeholder="Nomor STR" required />
            <button type="submit">Simpan Dokter</button>
            <a href="{{ url('/dokter') }}">Ke Halaman Dokter</a>
        </form>

        <!-- Form Tambah Tindakan -->
        <form action="/tindakan" method="POST" class="data-form">
            @csrf
            <h3>Tambah Tindakan</h3>
            <input type="text" name="nama_tindakan" placeholder="Nama_Tindakan" required />
            <input type="text" name="harga" placeholder="harga" required />
            <button type="submit">Simpan Tindakan</button>
        </form>

        <!-- Form Tambah Kunjungan -->
        <form action="/kunjungan" method="POST" class="data-form">
            @csrf
            <h3>Tambah Kunjungan</h3>
            <input type="number" name="pasien_id" placeholder="ID Pasien" required />
            <input type="number" name="dokter_id" placeholder="ID Dokter" required />
            <input type="date" name="tanggal" required />
            <textarea name="keluhan" placeholder="Keluhan" required></textarea>
            <button type="submit">Simpan Kunjungan</button>
        </form>
    </section>

    <footer>
        <p style="text-align: center; padding: 20px;">© 2025 Klinik XYZ</p>
    </footer>

</body>

</html>


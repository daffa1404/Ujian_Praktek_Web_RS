<!DOCTYPE html>
<html>

<head>
    <title>Daftar Dokter</title>
    <link rel="stylesheet" href="{{ asset('css/dokter.css') }}">
</head>

<body>
    <!-- HEADER -->
    <header>
        <div class="logo-center">
            <img src="{{ asset('img/liveal_iconpng.png') }}" style="width: 150px; height: auto;" alt="Logo Liveal" />
        </div>
        <nav>
            <ul class="menu-nav">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/pasien') }}">Pasien</a></li>
                <li><a href="{{ url('/dokter') }}">Dokter</a></li>
                <li><a href="{{ url('/tindakan') }}">Tindakan</a></li>
                <li><a href="{{ url('/kunjungan') }}">Kunjungan</a></li>
            </ul>
        </nav>
    </header>

    <!-- JUDUL -->
    <h1>Daftar Dokter</h1>

    <!-- TOMBOL TAMBAH -->
    <div class="container">
        <div style="text-align: right; margin-bottom: 15px;">
            <button onclick="openOverlay()" class="tambah-btn">+ Tambah Dokter</button>
        </div>

        <!-- TABEL DOKTER -->
        <table class="doctor-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Spesialis</th>
                    <th>Jadwal</th>
                    <th>No STR</th>
                    <th>Lainnya</th>
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
                            <span class="status-badge">Secure Data</span>
                            <button onclick="openOverlay({{ $dokter }})" class="edit-btn">Edit</button>
                            <form action="{{ url('/dokter/' . $dokter->id) }}" method="POST" style="display:inline;"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- OVERLAY FORM -->
    <div id="formOverlay" class="overlay">
        <div class="overlay-content">
            <span class="close-btn" onclick="closeOverlay()">&times;</span>
            <h2 id="formTitle">Tambah Dokter Baru</h2>
            <form id="dokterForm" method="POST">
                @csrf
                <input type="hidden" id="formMethod" name="_method" value="POST">
                <input type="hidden" id="dokterId" name="id" value="">

                <div class="form-group">
                    <label for="nama">Nama Dokter</label>
                    <input type="text" id="nama" name="nama" required>
                </div>

                <div class="form-group">
                    <label for="spesialis">Spesialis</label>
                    <input type="text" id="spesialis" name="spesialis" required>
                </div>

                <div class="form-group">
                    <label for="jadwal_praktek">Jadwal Praktek</label>
                    <input type="text" id="jadwal_praktek" name="jadwal_praktek" required>
                </div>

                <div class="form-group">
                    <label for="no_str">No STR</label>
                    <input type="text" id="no_str" name="no_str" required>
                </div>

                <button type="submit" class="submit-btn">Simpan</button>
            </form>
        </div>
    </div>

    <!-- FOOTER -->
    <footer style="background-color: #0a324d; color: white; padding: 40px 0; margin-top: 200px;">
        <div style="text-align: center;">
            <p style="margin: 5px 0;">© 2025 Rumah Sakit Liveal, All rights reserved.</p>
            <p style="margin: 0;">📍 Jl. Sakit No.666, Indonesia | ☎ (021) 124-8876</p>
        </div>
    </footer>

    <script>
        function openOverlay(dokter = null) {
            const overlay = document.getElementById('formOverlay');
            const form = document.getElementById('dokterForm');
            const formTitle = document.getElementById('formTitle');

            if (dokter) {
                // Edit mode
                formTitle.textContent = 'Edit Data Dokter';
                document.getElementById('formMethod').value = 'PUT';
                document.getElementById('dokterId').value = dokter.id;
                document.getElementById('nama').value = dokter.nama;
                document.getElementById('spesialis').value = dokter.spesialis;
                document.getElementById('jadwal_praktek').value = dokter.jadwal_praktek;
                document.getElementById('no_str').value = dokter.no_str;
                form.action = `/dokter/${dokter.id}`;
            } else {
                // Add mode
                formTitle.textContent = 'Tambah Dokter Baru';
                document.getElementById('formMethod').value = 'POST';
                form.reset();
                form.action = '/dokter';
            }

            overlay.style.display = 'flex';
        }

        function closeOverlay() {
            document.getElementById('formOverlay').style.display = 'none';
        }

        // Close overlay when clicking outside content
        window.onclick = function(event) {
            const overlay = document.getElementById('formOverlay');
            if (event.target == overlay) {
                closeOverlay();
            }
        }
    </script>
</body>

</html>

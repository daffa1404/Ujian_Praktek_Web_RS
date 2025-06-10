<!DOCTYPE html>
<html>

<head>
    <title>Daftar Kunjungan</title>
    <link rel="stylesheet" href="{{ asset('css/kunjungan.css') }}">
</head>

<body>
    <!-- HEADER -->
    <header>
        <div class="logo">
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

    <h1>Daftar Kunjungan</h1>

    <div class="container">
        <div style="text-align: right; margin-bottom: 15px;">
            <button onclick="openOverlay()" class="tambah-btn">+ Tambah Kunjungan</button>
        </div>

        <table class="kunjungan-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Pasien</th>
                    <th>Dokter</th>
                    <th>Tanggal</th>
                    <th>Keluhan</th>
                    <th>Lainnya</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kunjungans as $kunjungan)
                    <tr>
                        <td>{{ $kunjungan->id }}</td>
                        <td>{{ $kunjungan->pasien->nama }}</td>
                        <td>{{ $kunjungan->dokter->nama }}</td>
                        <td>{{ $kunjungan->tanggal }}</td>
                        <td>{{ $kunjungan->keluhan }}</td>
                        <td>
                            <button onclick='openOverlay(@json($kunjungan))' class="edit-btn">Edit</button>
                            <form action="{{ url('/kunjungan/' . $kunjungan->id) }}" method="POST" style="display:inline;"
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

    <!-- FORM OVERLAY -->
    <div id="formOverlay" class="overlay" style="display: none;">
        <div class="overlay-content">
            <span class="close-btn" onclick="closeOverlay()">&times;</span>
            <h2 id="formTitle">Tambah Kunjungan</h2>
            <form id="kunjunganForm" method="POST" action="{{ route('kunjungan.store') }}">
                @csrf
                <input type="hidden" id="formMethod" name="_method" value="POST">
                <input type="hidden" id="kunjunganId" name="id">

                <div class="form-group">
                    <label for="pasien_id">Pasien</label>
                    <select name="pasien_id" id="pasien_id" required>
                        @foreach ($pasiens as $pasien)
                            <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="dokter_id">Dokter</label>
                    <select name="dokter_id" id="dokter_id" required>
                        @foreach ($dokters as $dokter)
                            <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" required>
                </div>

                <div class="form-group">
                    <label for="keluhan">Keluhan</label>
                    <textarea id="keluhan" name="keluhan" rows="3" required></textarea>
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

    <!-- JAVASCRIPT -->
    <script>
        function openOverlay(kunjungan = null) {
            const overlay = document.getElementById('formOverlay');
            const form = document.getElementById('kunjunganForm');
            const formTitle = document.getElementById('formTitle');

            if (kunjungan) {
                formTitle.textContent = 'Edit Kunjungan';
                document.getElementById('formMethod').value = 'PUT';
                form.action = `/kunjungan/${kunjungan.id}`;
                document.getElementById('kunjunganId').value = kunjungan.id;
                document.getElementById('pasien_id').value = kunjungan.pasien_id;
                document.getElementById('dokter_id').value = kunjungan.dokter_id;
                document.getElementById('tanggal').value = kunjungan.tanggal;
                document.getElementById('keluhan').value = kunjungan.keluhan;
            } else {
                formTitle.textContent = 'Tambah Kunjungan';
                document.getElementById('formMethod').value = 'POST';
                form.action = '{{ route('kunjungan.store') }}';
                form.reset();
            }

            overlay.style.display = 'flex';
        }

        function closeOverlay() {
            document.getElementById('formOverlay').style.display = 'none';
        }

        window.onclick = function (event) {
            const overlay = document.getElementById('formOverlay');
            if (event.target === overlay) {
                closeOverlay();
            }
        }
    </script>
</body>

</html>
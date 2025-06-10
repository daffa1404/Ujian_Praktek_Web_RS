<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tindakan</title>
    <link rel="stylesheet" href="{{ asset('css/detail_tindakan.css') }}">
</head>
<body>
    <header>
        <div class="logo">
            <img src="{{ asset('image/kivotoshospital_ba-style@nulla.top.png') }}" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/pasien') }}">Pasien</a></li>
                <li><a href="{{ url('/dokter') }}">Dokter</a></li>
                <li><a href="{{ url('/tindakan') }}">Tindakan</a></li>
                <li><a href="{{ url('/kunjungan') }}">Kunjungan</a></li>
                <li><a class="active" href="{{ url('/detail-tindakan') }}">Detail Tindakan</a></li>
            </ul>
        </nav>
    </header>

    <h1>Daftar Detail Tindakan</h1>

    <div class="container">
        <div style="text-align: right; margin-bottom: 15px;">
            <button onclick="openOverlay()" class="tambah-btn">+ Tambah Detail</button>
        </div>

        <table class="detail-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kunjungan</th>
                    <th>Tindakan</th>
                    <th>Keterangan</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($details as $detail)
                <tr>
                    <td>{{ $detail->id }}</td>
                    <td>{{ $detail->kunjungan->id }} - {{ $detail->kunjungan->pasien->nama }}</td>
                    <td>{{ $detail->tindakan->nama_tindakan }}</td>
                    <td>{{ $detail->keterangan }}</td>
                    <td>Rp {{ number_format($detail->subtotal, 2, ',', '.') }}</td>
                    <td>
                        <button onclick='openOverlay(@json($detail))' class="edit-btn">Edit</button>
                        <form action="{{ url('/detail-tindakan/' . $detail->id) }}"
                                method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');"
                                style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="delete-btn">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div id="formOverlay" class="overlay">
        <div class="overlay-content">
            <span class="close-btn" onclick="closeOverlay()">&times;</span>
            <h2 id="formTitle">Tambah Detail Tindakan</h2>
            <form id="detailForm" method="POST" action="{{ url('/detail-tindakan') }}">
                @csrf
                <input type="hidden" id="formMethod" name="_method" value="POST">
                <input type="hidden" id="detailId" name="id">

                <div class="form-group">
                    <label for="kunjungan_id">Kunjungan</label>
                    <select name="kunjungan_id" id="kunjungan_id" required>
                        @foreach ($kunjungans as $k)
                            <option value="{{ $k->id }}">{{ $k->id }} - {{ $k->pasien->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tindakan_id">Tindakan</label>
                    <select name="tindakan_id" id="tindakan_id" required>
                        @foreach ($tindakans as $t)
                            <option value="{{ $t->id }}">{{ $t->nama_tindakan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea id="keterangan" name="keterangan" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="subtotal">Subtotal (Rp)</label>
                    <input type="number" id="subtotal" name="subtotal" min="0" step="1" required>
                </div>

                <button type="submit" class="submit-btn">Simpan</button>
            </form>
        </div>
    </div>

    <footer>
        <div style="text-align: center;">
            <p>© 2025 Kivotos Hospital, All rights reserved.</p>
            <p>📍 Jl. Sakit No.666, Indonesia | ☎ (021) 124-8876</p>
        </div>
    </footer>

    <script>
    function openOverlay(detail = null) {
        const overlay = document.getElementById('formOverlay');
        const form = document.getElementById('detailForm');
        const title = document.getElementById('formTitle');
        const method = document.getElementById('formMethod');
        const idInput = document.getElementById('detailId');

        detail ?
        (() => {
            title.textContent = 'Edit Detail Tindakan';
            method.value = 'PUT';
            form.action = `/detail-tindakan/${detail.id}`;
            idInput.value = detail.id;
            document.getElementById('kunjungan_id').value = detail.kunjungan_id;
            document.getElementById('tindakan_id').value = detail.tindakan_id;
            document.getElementById('keterangan').value = detail.keterangan;
            document.getElementById('subtotal').value = detail.subtotal;
        })() :
        (() => {
            title.textContent = 'Tambah Detail Tindakan';
            method.value = 'POST';
            form.action = `/detail-tindakan`;
            form.reset();
            idInput.value = '';
        })();

        overlay.style.display = 'flex';
    }

    function closeOverlay() {
        document.getElementById('formOverlay').style.display = 'none';
    }
    </script>
</body>
</html>

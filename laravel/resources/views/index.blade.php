<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rumah Sakit - Halaman Utama</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <!-- Header -->
    <header>
        <div class="container nav-container">
            <a href="#" class="logo"><img src="{{ asset('image/kivotoshospital_ba-style@nulla.top.png') }}" width="150" height="150" /></a>
            <nav>
                <ul>
                    <li><a href="{{ url('/') }}">home</a></li>
                    <li><a href="{{ url('/pasien') }}">pasien</a></li>
                    <li><a href="{{ url('/dokter') }}">Dokter</a></li>
                    <li><a href="{{ url('/tindakan') }}">Tindakan</a></li>
                    <li><a href="{{ url('/kunjungan') }}">kunjungan</a></li>
                    <li><a href="/detail kunjungan.html">detail kunjungan</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Pelayanan Kesehatan Terbaik untuk Keluarga Anda</h1>
            <p>Bersama kami, kesehatan Anda prioritas utama</p>
            <a href="{{ url('/tambah') }}" class="btn-primary">Reservasi Sekarang</a>
            <a href="{{ url('/dokter') }}" class="btn-outline">Lihat Jadwal Dokter</a>
        </div>
    </section>

    <!-- Layanan Unggulan -->
    <section class="services">
        <h2>Layanan Unggulan</h2>
        <div class="services-grid">
            <div class="service-item">
                <div class="service-icon">⏰</div>
                <div class="service-title">IGD 24 Jam</div>
            </div>
            <div class="service-item">
                <div class="service-icon">🏥</div>
                <div class="service-title">Rawat Inap</div>
            </div>
            <div class="service-item">
                <div class="service-icon">🧪</div>
                <div class="service-title">Laboratorium</div>
            </div>
            <div class="service-item">
                <div class="service-icon">🦷</div>
                <div class="service-title">Klinik Gigi</div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="contact-info">
            <span>📞 (021) 123-4567</span>
            <span>✉ info@rssehat.com</span>
            <span>📍 Jl. Sehat No.123, Jakarta</span>
        </div>
        <div class="social-icons">
            <a href="#" aria-label="Instagram">📸</a>
            <a href="#" aria-label="Facebook">📘</a>
            <a href="#" aria-label="Twitter">🐦</a>
        </div>
        <small>© 2025 RS Sehat Sentosa. All rights reserved.</small>
    </footer>
</body>

</html>

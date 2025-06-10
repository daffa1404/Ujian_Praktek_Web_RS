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
            <div class="logo-text-wrapper">
                <a href="#" class="logo">
                    <img src="{{ asset('img/liveal_iconpng.png') }}" style="width: 120px; height: auto;"
                        alt="Logo Liveal" />
                </a>
                <span class="tagline">𝑹𝒖𝒎𝒂𝒉 𝑺𝒂𝒌𝒊𝒕 𝑻𝒆𝒓𝒃𝒂𝒊𝒌</span>
            </div>
            <nav>
                <ul class="rounded-menu">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/pasien') }}">Pasien</a></li>
                    <li><a href="{{ url('/dokter') }}">Dokter</a></li>
                    <li><a href="{{ url('/tindakan') }}">Tindakan</a></li>
                    <li><a href="{{ url('/kunjungan') }}">Kunjungan</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Pelayanan Kesehatan Terbaik untuk Keluarga Anda</h1>
            <p>Bersama kami, kesehatan Anda prioritas utama</p>
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
            <span>📞 (021) 124-8876</span>
            <span>✉ info@liveal.com</span>
            <span>📍 Jl. Sakit No.666, Indonesia</span>
        </div>
        <small>© 2025 Rumah Sakit Liveal, All rights reserved.</small>
    </footer>
</body>

</html>

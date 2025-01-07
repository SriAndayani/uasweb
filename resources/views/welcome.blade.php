<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pemesanan Tiket Konser</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f5f6f7;
        }
        .navbar {
            background-color: #001f3f;
            padding: 15px 20px;
        }
        .navbar-brand {
            color: #f5f6f7;
            font-size: 1.8rem;
            font-weight: bold;
            text-decoration: none;

        }
        .btn-register {
            color: #ffffff;
            background-color: #003366; /* Warna hijau */
            border-color: #ffffff;
        }
        .btn-register:hover {
            background-color: #218838; /* Hijau lebih gelap untuk hover */
            border-color: #1e7e34;
        }
        .navbar-nav .nav-link {
            color: #f5f6f7;
            margin-right: 15px;
            text-decoration: none;
            font-weight: 500;
        }
        .navbar-nav .nav-link:hover {
            text-decoration: underline;
        }
        .navbar-nav .btn {
            margin-left: 10px;
        }
        .navbar-nav .btn:hover {
            background-color: #e6e6e6;
        }
        .hero {
            position: relative;
            height: 100vh;
            background: url('hero-image.jpg') no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #f5f6f7;
        }
        .hero::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 31, 63, 0.7);
        }
        .hero-content {
            position: relative;
            z-index: 2;
        }
        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .hero p {
            font-size: 1.5rem;
            margin-bottom: 30px;
        }
        .hero .btn {
            font-size: 1.2rem;
            padding: 10px 20px;
            border-radius: 50px;
        }
        .card-container {
            padding: 50px 20px;
            background-color: #f5f5dc;
        }
        .card {
            margin: 20px 0;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card img {
            max-height: 200px;
            object-fit: cover;
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .card-text {
            font-size: 1rem;
        }
        .card-price {
            font-size: 1.2rem;
            font-weight: bold;
            color: #001f3f;
        }
        .btn-primary {
            background-color: #001f3f;
            border-color: #001f3f;
        }
        .btn-primary:hover {
            background-color: #003366;
        }
        footer {
            background-color: #001f3f;
            color: #f5f6f7;
            padding: 20px 0;
            text-align: center;
        }
        footer a {
            color: #f5f6f7;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#beranda">TiketKonser</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#konser">Konser</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Customer
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Profil</a></li>
                            <li><a class="dropdown-item" href="#">Riwayat Pemesanan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Penyelenggara Event
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Tambah Event</a></li>
                            <li><a class="dropdown-item" href="#">Event Saya</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-register" href="#">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="beranda" class="hero">
        <div class="hero-content">
            <h1>Selamat Datang di Tiket Konser</h1>
            <p>Pesan tiket konser favoritmu dengan mudah dan cepat</p>
            <a href="#konser" class="btn btn-primary">Cari Tiket</a>
        </div>
    </div>

    <div id="konser" class="card-container container">
        <h2 class="text-center mb-4">Pilih Tiket Konser</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="concert1.jpg" class="card-img-top" alt="Konser A">
                    <div class="card-body">
                        <h5 class="card-title">Konser A</h5>
                        <p class="card-text">Diselenggarakan oleh: Organizer A</p>
                        <p class="card-price">Rp 500,000</p>
                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="concert1.jpg" class="card-img-top" alt="Konser B">
                    <div class="card-body">
                        <h5 class="card-title">Konser B</h5>
                        <p class="card-text">Diselenggarakan oleh: Organizer B</p>
                        <p class="card-price">Rp 750,000</p>
                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="concert1.jpg" class="card-img-top" alt="Konser C">
                    <div class="card-body">
                        <h5 class="card-title">Konser C</h5>
                        <p class="card-text">Diselenggarakan oleh: Organizer C</p>
                        <p class="card-price">Rp 1,000,000</p>
                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        </div>

    <div id="tentang" class="container my-5">
        <h2 class="text-center mb-4">Tentang Kami</h2>
        <p class="text-center">Kami adalah platform pemesanan tiket konser yang terpercaya dan memberikan kemudahan bagi pengguna untuk mendapatkan pengalaman konser terbaik.</p>
    </div>

    <div id="kontak" class="container my-5">
        <h2 class="text-center mb-4">Kontak Kami</h2>
        <p class="text-center">Untuk informasi lebih lanjut, hubungi kami di support@tiketkonser.com atau telepon +62 123 4567 890.</p>
    </div>

    <footer>
        <p>&copy; 2024 TiketKonser. All Rights Reserved.</p>
        <p><a href="#">Kebijakan Privasi</a> | <a href="#">Syarat & Ketentuan</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

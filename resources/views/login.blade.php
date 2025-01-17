<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>TiketEvent | Login</title>
</head>
{{-- row w-50 center border rounded px-3 py-3 mx-auto --}}
<body>
    <div class="container d-flex">
        <!-- Kolom Gambar -->
        <div class="image-box col-6 d-none d-md-block">
            <img src="{{ asset('asset/login1.jpg') }}" alt="Deskripsi Gambar" class="img-logo img-fluid h-100 w-100">
        </div>
        <!-- Kolom Form -->
        <div class="form-box col-12 col-md-6">
            <form action="" method="POST">
                <h1 class="text-center">Login</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{$item}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @csrf
                <div class="input-box">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" value="" name="email" class="form-control">
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="mb-3 d-flex justify-content-center">
                    <button name="submit" type="submit" class="btn btn-primary col-6">Login</button>
                </div>
                <div class="d-flex justify-content-center">
                    <p>Belum punya Akun?<a href="{{ route('register') }}">Daftar</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

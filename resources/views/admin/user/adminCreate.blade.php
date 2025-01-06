@extends('layout.admin')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
                <h1>Form Tambah Data Admin</h1>
                <div>
                <form action="{{ route('admin.store')}}" method="post">
                    @csrf
                    <hr>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="name" name="name" id="name" class="form-control" placeholder="Masukkan Nama" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Nomor Telepon</label>
                        <input type="tel" name="phone" id="phone" class="form-control" placeholder="Masukkan nomor telepon" required>
                    </div>
                    <hr>
                    <div class="text-center">
                        <a href="{{ route('admin.admin')}}" class="btn btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
                </div>
        </div>
    </div>
</div>
@endsection

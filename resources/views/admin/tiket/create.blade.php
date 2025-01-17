@extends('layout.admin')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
                <h1>Tambah Jenis Tiket</h1>
                <div>
                <form action="{{ route('tiket.store', $event_id)}}" method="post">
                    @csrf
                    <hr>
                    <div class="form-group">
                        <label for="nama">Nama Kategori</label>
                        <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" placeholder="Masukkan nama events" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukkan nama penyelenggara" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" step="0.01" name="price" id="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="stok_tiket">Stok</label>
                        <input type="number" step="1" name="stok_tiket" id="stok_tiket" class="form-control" required>
                    </div>
                    <hr>
                    <div class="text-center">
                        <a href="{{ route('admin.tiket')}}" class="btn btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
                </div>
        </div>
    </div>
</div>
@endsection

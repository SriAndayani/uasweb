@extends('layout.admin')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
                <h1>Form Tambah Event Baru</h1>
                <div>
                <form action="{{ route('event.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <hr>
                    <div class="form-group">
                        <label for="nama">Nama Event</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama events" required>
                    </div>
                    <div class="form-group">
                        <label for="penyelenggara">Penyelenggara</label>
                        <input type="text" name="penyelenggara" id="penyelenggara" class="form-control" placeholder="Masukkan nama penyelenggara" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Upload Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_event">Tanggal Event</label>
                        <input type="date" name="tanggal_event" id="tanggal_event" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Masukkan Lokasi Events" required >
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukkan Deskripsi Events" required >
                    </div>
                    <hr>
                    <div class="text-center">
                        <a href="{{ route('admin.event')}}" class="btn btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
                </div>
        </div>
    </div>
</div>
@endsection

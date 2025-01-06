@extends('layout.admin')

@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h1>Form Edit Data Event</h1>
                </div>
                    <div>
                    <form action="{{ route('event.update', $events->id)}} " method="post" >
                        @csrf
                        @method('PUT')
                        <hr>
                        <div class="form-group">
                            <label for="nama">Nama Event</label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama', $events->nama) }}" class="form-control" placeholder="Masukkan nama events" required>
                        </div>
                        <div class="form-group">
                            <label for="penyelenggara">Penyelenggara</label>
                            <input type="text" name="penyelenggara" id="penyelenggara" value="{{ old('penyelenggara', $events->penyelenggara) }}" class="form-control" placeholder="Masukkan nama penyelenggara" required>
                        </div>
                        <div class="form-group">
                            <label>Gambar Saat Ini:</label>
                            <img src="{{ asset('storage/' . $events->gambar) }}" alt="Gambar Event" width="150"><br>
                            <label>Ganti Gambar:</label>
                            <input type="file" name="gambar"><br>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_event">Tanggal Event</label>
                            <input type="date" name="tanggal_event" id="tanggal_event" value="{{ old('tanggal', $events->tanggal ?? '') }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi', $events->lokasi) }}" class="form-control" placeholder="Masukkan Lokasi Events" required >
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" name="deskripsi" id="deskripsi" value="{{ old('deskripsi', $events->deskripsi) }}" class="form-control" placeholder="Masukkan Deskripsi Events" required >
                        </div>
                        <hr>
                        <div class="text-center">
                            <a href="{{ route('admin.event') }}" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-success"> Simpan</button>
                        </div>
                    </form>
                    </div>
            </div>
        </div>
    </div>
    <hr>
@endsection

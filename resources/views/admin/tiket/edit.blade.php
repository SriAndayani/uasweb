@extends('layout.admin')

@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h1>Form Edit Data Tiket</h1>
                </div>
                    <div>
                    <form action="{{ route('tiket.update', $tikets->id)}} " method="post" >
                        @csrf
                        @method('PUT')
                        <hr>
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" name="nama_kategori" id="nama_kategori" value="{{ old('nama_kategori', $tikets->nama_kategori) }}" class="form-control" placeholder="Masukkan nama events" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" name="deskripsi" id="deskripsi" value="{{ old('deskripsi', $tikets->deskripsi) }}" class="form-control" placeholder="Masukkan nama penyelenggara" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $tikets->price) }}" class="form-control" required>
                        </div>
                        <hr>
                        <div class="text-center">
                            <a href="{{ route('tiket.detail', $events->id) }}" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-success"> Simpan</button>
                        </div>
                    </form>
                    </div>
            </div>
        </div>
    </div>
    <hr>
@endsection

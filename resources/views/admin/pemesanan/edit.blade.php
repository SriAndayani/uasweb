@extends('layout.admin')

@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h1>Validasi Pemesanan</h1>
                </div>
                    <div>
                    <form action="{{ route('pemesanan.update', $pemesanan->id)}} " method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <hr>
                        <div class="form-group">
                            <label for="nama">Nama Pelanggan</label>
                            <input type="text" name="nama" id="nama" value="{{ $pemesanan->user->name }}" class="form-control" placeholder="Masukkan nama events" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_event">Nama Event</label>
                            <input type="text" name="nama_event" id="nama_event" value="{{ $pemesanan->event->name }}" class="form-control" placeholder="Masukkan nama penyelenggara" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_kategori">Kategori Tiket</label>
                            <input type="text" name="nama_kategori" id="nama_kategori" value="{{ $pemesanan->tiket->nama_kategori }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah Tiket yang di beli</label>
                            <input type="integer" name="jumlah" id="jumlah" value="{{ $pemesanan->jumlah_tiket }}" class="form-control" placeholder="Masukkan Lokasi Events" readonly >
                        </div>
                        <div class="form-group">
                            <label for="total_harga">Total Harga</label>
                            <input type="number" step="1" name="total_harga" id="total_harga" value="{{ $pemesanan->total_harga }}" class="form-control" placeholder="Masukkan Deskripsi Events" readonly >
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="pending" {{ $pemesanan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="dibayar" {{ $pemesanan->status == 'dibayar' ? 'selected' : '' }}>Dibayar</option>
                                <option value="batal" {{ $pemesanan->status == 'batal' ? 'selected' : '' }}>Batal</option>
                            </select>
                        </div>

                        <hr>
                        <div class="text-center">
                            <a href="{{ route('pemesanan.index') }}" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-success"> Simpan</button>
                        </div>
                    </form>
                    </div>
            </div>
        </div>
    </div>
    <hr>
@endsection

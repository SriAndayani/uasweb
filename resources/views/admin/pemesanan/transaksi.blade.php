@extends('layout.admin')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h1>Data Pemesanan</h1>
            <hr>
            {{-- @if($pemesanans->isEmpty())
                <p>Data transaksi tidak tersedia.</p>
            @else --}}
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama User</th>
                            <th>Nama Event</th>
                            <th>Kategori Tiket</th>
                            <th>Jumlah Tiket</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pemesanan as $pesan)
                        <tr>
                            <td>{{ $pesan->id }}</td>
                            <td>{{ $pesan->user->name }}</td>
                            <td>{{ $pesan->event->nama }}</td>
                            <td>{{ $pesan->tiket->nama_kategori }}</td>
                            <td>{{ $pesan->jumlah_tiket }}</td>
                            <td>{{ $pesan->total_harga }}</td>
                            <td>{{ $pesan->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            {{-- @endif --}}
        </div>
    </div>
</div>
<hr>
@endsection

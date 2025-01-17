@extends('layout.home')

@section('content')
<div class="container">
    <div class="page-header">
        <h1 class="m-4">Riwayat Pemesanan</h1>
        <hr>
        @if($pemesanan->isEmpty())
            <p>Anda belum melakukan transaksi.</p>
        @else
            @foreach ($pemesanan as $pesan)
                <div class="custom-card card m-4 text-start">
                    <h5 class="card-header text-start">{{ $pesan->created_at->translatedFormat('d F Y H:i') }}</h5>
                    <div class="card-body text-start">
                        <h5 class="card-title md-4"><strong>{{ $pesan->event->nama }}</strong></h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $pesan->tiket->nama_kategori }}</li>
                            <li class="list-group-item">{{ $pesan->jumlah_tiket }}</li>
                            <li class="list-group-item">{{ $pesan->total_harga }}</li>
                            <li class="list-group-item text-warning">-- {{ $pesan->status }}</li>
                        </ul>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>


@endsection

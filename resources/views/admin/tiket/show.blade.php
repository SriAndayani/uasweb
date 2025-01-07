@extends('layout.admin')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body d-flex justify-content-around mx-3"> 
            @foreach ($events as $event)
            <div class="card" style="width: 18rem;">
                <img src="{{ $event->gambar }}" class="card-img-top" alt="Gambar Konser">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->nama }}</h5>
                    <p class="card-text">Jenis Tiket yang Tersedia</p>
                </div>
                <div class="p-2 d-grid gap-2">
                    @foreach ($event->tikets as $tiket)
                        <a href="#" class="btn btn-primary btn-block">{{ $tiket->nama_kategori }}</a>
                    @endforeach
                </div>
                <div class="card-body">
                    <a href="{{ route('tiket.detail', $tiket->id) }}" class="card-link">Detail tiket >></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
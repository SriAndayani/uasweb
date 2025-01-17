@extends('layout.admin')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <div class="row row-cols-1 row-cols-md-3 g-4"> <!-- Menambahkan kelas grid system -->
                @foreach ($events as $event)
                <div class="col mb-4"> <!-- Membuat setiap card berada di dalam kolom -->
                    <div class="card">
                        <img src="{{ asset($event->gambar) }}" class="card-img-top" alt="Gambar Konser">
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
                            <a href="{{ route('tiket.detail', $event->id) }}" class="card-link">Detail tiket >></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

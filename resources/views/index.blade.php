@extends('layout.home')

@section('content')
{{-- img slider --}}
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" data-bs-pause="false">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('asset/konser2.jpeg') }}" class="d-block w-100" style="height: 500px; object-fit: cover;" alt="Konser 1">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('asset/konser2.jpeg') }}" class="d-block w-100" style="height: 500px; object-fit: cover;" alt="Konser 2">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('asset/konser2.jpeg') }}" class="d-block w-100" style="height: 500px; object-fit: cover;" alt="Konser 3">
        </div>
    </div>
</div>
{{-- card event --}}
<h3 class="p-5 text-center text-underline">Rekomendasi Event</h3>
<div class="container px-4">
    <div class="container">
        <div class="row g-2">
            @foreach ($events as $event)
                <div class="col-4 mb-3">
                    <div class="p-3">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ $event->gambar }}" class="card-img-top img-same-size" alt="...">
                            <div class="card-body">
                                <h5 style="margin-bottom: 1px;">{{ $event->nama }}</h5>
                                <p class="font-1" style="margin-top: 1px; margin-bottom: 1px;">{{ \Carbon\Carbon::parse($event->tanggal_event)->format('d F Y') }}</p>
                                <hr>
                                <div class="mb-3 d-flex justify-content-center">
                                    <a href="{{ route('detail.event', $event->id) }}" class="button">Beli Tiket</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

</div>
@endsection

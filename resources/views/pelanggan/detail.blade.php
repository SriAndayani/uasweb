@extends('layout.home')

@section('content')

<div class="container">
    <div class="event-image">
        <img src="{{ asset($event->gambar) }}" alt="Event Image">
    </div>

    <div class="event-details d-flex flex-wrap mt-4">
        <div class="flex-grow-1">
            <h2>{{ $event->nama }}</h2>
            <div class="info-container">
                <!-- Tanggal -->
                <div class="info-item d-flex mb-3">
                    <div class="info-icon me-2" style="width: 24px;">
                        <i class='bx bx-calendar'></i>
                    </div>
                    <div class="info-text flex-grow-1">
                        <span class="info-label d-block fw-bold">Tanggal</span>
                        <span class="info-value">{{ $event->tanggal_event }}</span>
                    </div>
                </div>
                <!-- Lokasi -->
                <div class="info-item d-flex mb-3">
                    <div class="info-icon me-2" style="width: 24px;">
                        <i class='bx bx-map'></i>
                    </div>
                    <div class="info-text flex-grow-1">
                        <span class="info-label d-block fw-bold">Lokasi</span>
                        <span class="info-value">{{ $event->lokasi }}</span>
                    </div>
                </div>
                <!-- Penyelenggara -->
                <div class="info-item d-flex mb-3">
                    <div class="info-icon me-2" style="width: 24px;">
                        <i class='bx bx-user-circle'></i>
                    </div>
                    <div class="info-text flex-grow-1">
                        <span class="info-label d-block fw-bold">Penyelenggara</span>
                        <span class="info-value">{{ $event->penyelenggara }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="ticket-info d-flex justify-content-center align-items-center">
            <div>
                <p><strong>Click tombol Beli tiket!</strong></p>
                <a href="{{ route('pelanggan.pemesanan', $event->id) }}" class="btn btn-info w-100">Beli Tiket</a>
            </div>
        </div>
    </div>

    <div class="event-description mt-5">
        <h3>DESCRIPTION</h3>
        <p>{{ $event->deskripsi }}</p>
    </div>
</div>

<style>
    .container {
        padding: 20px;
    }

    .event-image img {
        width: 100%;
        height: auto;
        border-radius: 10px;
    }

    .info-item {
        display: flex;
        align-items: center;
    }

    .info-icon {
        flex-shrink: 0;
    }

    .info-text {
        flex-grow: 1;
    }

    .ticket-info {
        max-width: 300px;
    }git 

    @media (max-width: 768px) {
        .container {
            padding: 10px;
        }

        .event-details {
            flex-direction: column;
        }

        /* .ticket-info {
            margin-top: 20px;
            max-width: 100%;
        } */
    }
</style>

@endsection

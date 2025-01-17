@extends('layout.home')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <div class="page-header mt-5">
        <h1>Metode Pembayaran</h1>
    </div>
    <form action="{{ route('pelanggan.detail-pembayaran') }}" method="post" id="checkout-form" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <!-- Kolom kiri: Formulir Pemesanan -->
        <div class="col-md-6">
            <div class="ticket-selection">
                <h3 class="">Metode Pembayaran</h3>
                <div class="qr-code d-flex flex-column align-items-center">
                    <img class="qris mb-3" src="{{ asset('asset/qris.jpg') }}" alt="Qris Logo">
                    <img src="{{ asset('asset/qr-code.png') }}" alt="Event Image">
                    <p>Silakan scan QR Code di atas untuk melakukan pembayaran.</p>
                </div>
                <div class="form-group">
                    <label for="bukti_bayar">Upload bukti bayar</label>
                    <input type="file" name="bukti_bayar" id="bukti_bayar" class="form-control">
                </div>
            </div>
        </div>

        <!-- Kolom kanan: Pilihan Jenis Tiket -->
        <div class="col-md-6">
            <div class="ticket-info">
                <h3>Detail Pemesanan</h3>
                <div class="row w-100 flex-column">
                    <div class="form-group">
                        <label for="nama_event">Event</label>
                        <input type="text" id="nama_event" name="nama_event" class="form-control" value="{{ $data['nama_event'] }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="ticket_name">Kategori Tiket</label>
                        <input type="text" id="ticket_name" name="ticket_name" class="form-control" value="{{ $data['ticket_name'] }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Jumlah Tiket</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" value="{{ $data['quantity'] }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="total_price">Total</label>
                        <input type="number" id="total_price" name="total_price" class="form-control" value="{{ $data['total_price'] }}" readonly>
                    </div>
                    <input type="hidden" name="event_id" value="{{ $data['event_id'] }}">
                </div>
                <div class="mt-4">
                    <button class="buy-ticket-btn d-block w-100 text-center" id="checkout-button">Checkout</button>
                    {{-- <a class="buy-ticket-btn d-block w-100 text-center" id="checkout-button">Checkout</a> --}}
                </div>
                <div class="mt-2">
                    <a href="{{ route('index.pelanggan') }}" class="btn btn-danger d-block w-100 text-center">Batal</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@push('js')
<script>
    document.getElementById('checkout-button').addEventListener('click', function (e) {
        e.preventDefault(); // Mencegah default button action
        Swal.fire({
            title: 'Checkout progresed',
            text: "Pesanan anda sedang si proses",
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, lanjutkan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect ke form checkout
                window.location.href = '/link-ke-form-checkout';
            }
        });
    });
</script>



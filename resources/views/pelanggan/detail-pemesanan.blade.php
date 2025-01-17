@extends('layout.home')

@section('content')
@if ($errors->any())
@endif
<form action="{{ route('pemesanan.checkout') }}" method="post" id="checkout-form">
@csrf
<div class="container">
    <div class="page-header">
        <h1>Detail Pemesanan</h1>
        <p>Konfirmasi data diri dan pesanan</p>
    </div>

    <div class="row">
        <!-- Kolom kiri: Formulir Pemesanan -->
        <div class="col-md-6">
            <div class="ticket-selection">
                <h3>Formulir Pesanan</h3>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" class="form-control" value="{{ auth()->user()->name }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="phone">Nomor Telepon</label>
                        <input type="tel" id="phone" name="phone" class="form-control" value="{{ auth()->user()->phone }}" readonly>
                    </div>
                </form>
            </div>
        </div>

        <!-- Kolom kanan: Pilihan Jenis Tiket -->
        <div class="col-md-6">
            <div class="ticket-info">
                <h3>Detail Pemesanan</h3>
                <div class="row w-100 flex-column">
                    <p>Nama Event: {{ $data['nama_event'] }}</p>
                    <p>Jenis Tiket: {{ $data['ticket_name'] }}</p>
                    <p>Jumlah Tiket: {{ $data['quantity'] }}</p>
                    <p>Harga per Tiket: Rp{{ number_format($data['price'], 0, ',', '.') }}</p>
                    <p>Total Harga: Rp{{ number_format($data['total_price'], 0, ',', '.') }}</p>
                </div>

                <input type="hidden" name="nama_event" value="{{ $data['nama_event'] }}">
                <input type="hidden" name="ticket_name" value="{{ $data['ticket_name'] }}">
                <input type="hidden" name="quantity" value="{{ $data['quantity'] }}">
                <input type="hidden" name="price" value="{{ $data['price'] }}">
                <input type="hidden" name="total_price" value="{{ $data['total_price'] }}">
                <input type="hidden" name="event_id" value="{{ $data['event_id'] }}">
                <div class="mt-4">
                    {{-- <a href="{{ route('pelanggan.pembayaran') }}" class="buy-ticket-btn d-block w-100 text-center" id="checkout-button">Checkout</a> --}}

                        <!-- Form fields here -->
                        <a href="#" class="buy-ticket-btn d-block w-100 text-center" id="checkout-button">Checkout</a>
                </div>

                @error('nama')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                @error('phone')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                @error('nama_event')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                @error('ticket_name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                @error('quantity')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                @error('price')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                @error('total_price')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
</div>
</form>


@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@push('js')
<script>
    document.getElementById('checkout-button').addEventListener('click', function (e) {
        e.preventDefault(); // Mencegah form langsung disubmit
        console.log('Checkout button clicked');

        // Menampilkan SweetAlert
        Swal.fire({
            title: 'Pesanan sedang diproses',
            text: 'Apakah Anda ingin melanjutkan ke pembayaran?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Ya, lanjutkan!',
            cancelButtonText: 'Batal'
        }).then(() => {
            // Submit form setelah 3 detik
            document.getElementById('checkout-form').submit();
        });
    });
</script>
@endpush

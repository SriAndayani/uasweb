@extends('layout.home')

@section('content')

<div class="container">
    <div class="page-header">
        <h1>Pembelian Tiket</h1>
        <p>Isi data dan pilih tiket yang ingin Anda beli</p>
    </div>

    <div class="row">
        <!-- Kolom kiri: Detail Tiket -->
        <div class="col-md-6">
            <div class="ticket-selection">
                <h3>Detail Tiket</h3>
                <form id="checkout-form" action="{{ route('checkout.pemesanan') }}" method="POST">
                    @csrf
                    <div id="selected-ticket-details">
                        <p>Tidak ada tiket yang dipilih.</p>
                    </div>
                    <input type="hidden" name="nama_event" value="{{ $event->nama }}">
                    <input type="hidden" id="ticket-name" name="ticket_name">
                    <input type="hidden" id="ticket-quantity" name="quantity">
                    <input type="hidden" id="ticket-price" name="price">
                    <input type="hidden" id="total-price" name="total_price">
                    <input type="hidden" name="event_id" value="{{ $event_id }}">

                    <div class="mt-4">
                        <h5>Total Harga: Rp<span id="total-harga">0</span></h5>
                        <button type="submit" class="btn btn-primary buy-ticket-btn">Lanjutkan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Kolom kanan: Pilihan Jenis Tiket -->
        <div class="col-md-6">
            <div class="ticket-info">
                <h3>Pilih Jenis Tiket</h3>
                <div class="row w-100 flex-column">
                    @foreach ($tikets as $i => $d)
                        @if ($d->stok_tiket >0)
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $d->nama_kategori }}</h4>
                                        <h5 class="ticket-price">Rp{{ number_format($d->price, 0, ',', '.') }}</h5>
                                        <div class="ticket-quantity">
                                            <label for="quantity-{{ $i }}">Jumlah Tiket:</label>
                                            <input class="form-control ticket-quantity-input" type="number" id="quantity-{{ $i }}" name="quantity" class="form-control ticket-quantity-input"
                                                min="1" value="1" required>
                                            <h5>Stok : {{ $d->stok_tiket }}</h5>
                                        </div>
                                        <input type="radio" name="ticket"
                                            value="{{ $d->nama_kategori }}"
                                            data-price="{{ $d->price }}"
                                            data-quantity-input="quantity-{{ $i }}"
                                            class="form-check-input" required>
                                    </div>
                                </div>
                            </div>
                        @else
                            {{-- Tampilkan jika stok 0, tetapi dinonaktifkan --}}
                            <div class="col-12 mb-3">
                                <div class="card bg-light text-muted">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $d->nama_kategori }}</h4>
                                        <h5 class="ticket-price">Rp{{ number_format($d->price, 0, ',', '.') }}</h5>
                                        <div class="ticket-quantity">
                                            <h5>Stok: Habis</h5>
                                        </div>
                                        <p class="text-danger">Tiket ini sudah habis terjual.</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const radioInputs = document.querySelectorAll('input[name="ticket"]');
    const totalHargaEl = document.getElementById('total-harga');
    const selectedTicketDetailsEl = document.getElementById('selected-ticket-details');
    const ticketNameInput = document.getElementById('ticket-name');
    const ticketQuantityInput = document.getElementById('ticket-quantity');
    const ticketPriceInput = document.getElementById('ticket-price');
    const totalPriceInput = document.getElementById('total-price');

    function calculateTotal() {
        const selectedRadio = document.querySelector('input[name="ticket"]:checked');
        if (selectedRadio) {
            const price = parseFloat(selectedRadio.dataset.price);
            const quantityInputId = selectedRadio.dataset.quantityInput;
            const quantityInput = document.getElementById(quantityInputId);
            const quantity = parseInt(quantityInput.value);

            if (!isNaN(price) && !isNaN(quantity)) {
                const total = price * quantity;
                totalHargaEl.textContent = total.toLocaleString('id-ID');
                updateSelectedTicketDetails(selectedRadio.value, quantity, price, total);
            }
        }
    }

    function updateSelectedTicketDetails(ticketName, quantity, price, total) {
        selectedTicketDetailsEl.innerHTML = `
            <p>Jenis Tiket: <strong>${ticketName}</strong></p>
            <p>Jumlah Tiket: <strong>${quantity}</strong></p>
            <p>Harga per Tiket: <strong>Rp${price.toLocaleString('id-ID')}</strong></p>
        `;
        ticketNameInput.value = ticketName;
        ticketQuantityInput.value = quantity;
        ticketPriceInput.value = price;
        totalPriceInput.value = total;
    }

    radioInputs.forEach(radio => {
        radio.addEventListener('change', calculateTotal);
    });

    const quantityInputs = document.querySelectorAll('.ticket-quantity-input');
    quantityInputs.forEach(input => {
        input.addEventListener('input', calculateTotal);
    });
});

</script>

@endsection

@php
$user_id = Auth::id();
@endphp
<nav class=" navbar-custom main-header navbar navbar-expand navbar-white navbar-light ml-auto">
    {{-- Logo Tiket Event --}}
    <div class=" d-flex align-items-center justify-content-between px-4">
        <img class="navbar-logo" src="{{ asset('asset/Logo.png') }}" alt="Logo">
        {{-- <h3 class="brand-title">Tiket<span class="e">E</span>vent</h3> --}}
    </div>
    <div class="clearfix navbar-nav ml-auto">
        <ul class="d-flex m-0"> <!-- Menambahkan d-flex dan menghapus margin -->
            <li class="mx-4 nav-item"> <!-- Memberikan jarak antar item -->
                <a href="{{ route('pelanggan.riwayat', $user_id) }}">Pesanan</a>
            </li>
            <li class="nav-item dropdown mx-2">
                <a class="dropdown-toggle btn btn-custom-regis" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>

</nav>

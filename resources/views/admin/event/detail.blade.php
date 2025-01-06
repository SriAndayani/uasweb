@extends('layout.admin')

@section('content')
    <div class="content-wrapper">
        <div class="card">
           <div class="card-body">
            <div class="d-flex justify-content-between">
                <h1>Detail Data Event</h1>
            </div>
            <hr>
            <table class="table table-condensed">
                <tbody>
                    <tr>
                        <th>Nama</th>
                        <th>:</th>
                        <th>{{ $events->nama }}</th>
                    </tr>
                    <tr>
                        <th>Gambar</th>
                        <th>:</th>
                        <th>
                            @if($events->gambar)
                            <img src="{{ asset($events->gambar) }}" alt="Gambar Event" style="width: 100px; height: auto;">
                            @else
                                <span>Tidak ada gambar</span>
                            @endif</th>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <th>:</th>
                        <th>{{ $events->deskripsi }}</th>
                    </tr>
                    <tr>
                        <th>Tanggal dilaksanakan</th>
                        <th>:</th>
                        <th>{{ $events->tanggal_event }}</th>
                    </tr>
                    <tr>
                        <th>Lokasi</th>
                        <th>:</th>
                        <th>{{ $events->lokasi }}</th>
                    </tr>
                </tbody>
            </table>
           </div>

        </div>
    </div>
    <hr>
@endsection

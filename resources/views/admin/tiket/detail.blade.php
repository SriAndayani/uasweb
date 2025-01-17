@extends('layout.admin')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
                <h1>Detail Tiket {{ $event->nama }}</h1>
                @if (session('created'))
                <div class="alert alert-success" role="alert">
                    {{ session('created') }}
                </div>
                @endif
                @if (session('updated'))
                    <div class="alert alert-warning" role="alert">
                        {{ session('updated') }}
                    </div>
                @endif
                @if (session('deleted'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('deleted') }}
                    </div>
                @endif
                <hr>
                <div class="d-flex justify-content-end mb-3">

                    <div class="d-flex justify-content-end m-2">
                        <a href="{{ route('tiket.create', $event->id) }}" class="btn btn-primary">
                            Tambah Jenis Tiket
                        </a>
                    </div>
                </div>
                <hr>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Stok Tiket</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tikets as $i => $d)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $d->nama_kategori }}</td>
                            <td>{{ $d->deskripsi }}</td>
                            <td>{{ $d->price }}</td>
                            <td>{{ $d->stok_tiket }}</td>
                            <td>
                                <a href="{{ route('tiket.edit', $d->id) }}" class="btn btn-sm btn-warning">
                                    <i class='bx bxs-edit-alt' ></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-danger"
                                    onclick="hapusData(`btndelete{{ $d->id }}`)">
                                    <i class='bx bxs-trash' ></i>
                                </button>
                                <form action="{{ route('tiket.destroy', $d->id) }}" method="POST" style="display: none">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="hidden" style="display: none" id="btndelete{{ $d->id }}"></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
<hr>
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@push('js')
    <script>
        function hapusData(id) {
            console.log("Memulai hapus untuk ID:", id);
            Swal.fire({
                title: "Apakah yakin ingin menghapus akun ini?",
                text: "Setelah data dihapus, tidak dapat dipulihkan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Iya, Hapus!",
                cancelButtonText: "Tidak",
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(id).click();
                }
            });
        }
    </script>
@endpush

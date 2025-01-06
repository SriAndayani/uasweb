@extends('layout.admin')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
                <h1>Data Pelanggan</h1>
                <hr>
                <div class="d-flex justify-content-end mb-3">
                    {{-- FORM PENCARIAN --}}
                    <form action="#" method="GET" class="mb-3">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari dengan nama" class="form-control" style="width: 300px; display: inline-block;">
                        <button type="submit" class="btn btn-secondary">Cari</button>
                    </form>
                </div>

                <hr>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Password</th>
                            <th>status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $i => $d)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->email }}</td>
                            <td>{{ $d->phone }}</td>
                            <td>{{ $d->password }}</td>
                            <td>{{ $d->is_aktif == '1' ? 'Aktif' : 'Nonaktif' }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-danger"
                                    onclick="hapusData(`btndelete{{ $d->id }}`)">
                                    <i class='bx bxs-trash' ></i>
                                </button>
                                <form action="#" method="POST" style="display: none">
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

@extends('layouts.app')

@section('content')

<h1>Tambah Data Anggota</h1>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('anggota.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <input type="text" name="kelas" id="kelas" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <input type="text" name="jurusan" id="jurusan" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        {{-- <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control" required> --}}
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="laki-laki" name="Laki-laki">Laki-laki</option>
                            <option value="perempuan" name="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No. Telepon</label>
                        <input type="number" name="no_hp" id="no_hp" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>

                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script>
                        @if (session('success'))
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: '{{ session('success') }}',
                                showConfirmButton: false,
                                timer: 1000
                            }).then(function() {
                                window.location.href = '{{ route('anggota.index') }}';
                            });
                        @endif
                    </script>
            </div>
        </div>
    </div>
</div>
@endsection

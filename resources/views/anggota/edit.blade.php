<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anggota | Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="shortcut icon" href="https://laravel.com/img/favicon/favicon-32x32.png" type="image/x-icon">
    <style>
        * {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>

<body>
    <nav class="shadow-lg navbar-1-1 navbar navbar-expand-lg sticky-top" style="background-color: #FCFFE7;">
        <div class="container">
            <img src="https://laravel.com/img/favicon/favicon-32x32.png" alt="" width="25">
            <a class="navbar-brand ms-2 fw-semibold" href="#">
                SIOTICS | SMKN 1 Jakarta
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="gap-2 navbar-nav ms-md-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('anggota.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('anggota.create') }}">Tambah Data</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">{{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <p class="dropdown-item" href="#">{{ Auth::user()->name }}<br><small
                                        class="text-capitalize">({{ Auth::user()->role->name }})</small></p>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item text-primary" href="logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">

        <h4>Edit Data Anggota</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('anggota.update', $student->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    value="{{ old('nama') ?? $student->nama }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <input type="text" name="kelas" id="kelas" class="form-control"
                                    value="{{ old('kelas') ?? $student->kelas }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input type="text" name="jurusan" id="jurusan" class="form-control"
                                    value="{{ old('jurusan') ?? $student->jurusan }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ old('email') ?? $student->email }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki"
                                        {{ (old('jenis_kelamin') ?? $student->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan"
                                        {{ (old('jenis_kelamin') ?? $student->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>

                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No. Telepon</label>
                                <input type="number" name="no_hp" id="no_hp" class="form-control"
                                    value="{{ old('no_hp') ?? $student->no_hp }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control"
                                    value="{{ old('tgl_lahir') ?? $student->tgl_lahir }}" required>
                            </div>
                            <button type="update" class="btn btn-primary">Update</button>
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

    </div>

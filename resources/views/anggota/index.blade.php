@extends('layouts.app')

@section('content')
    <nav class="navbar ">
        <div class="container">
            <h4 class=" fw-semibold">Data Anggota</h4>
            <form class="d-flex">
                <input class="form-control me-2" type="search" id="search" placeholder="Cari Data" aria-label="Search"
                    style="background-color: #eaeaea">
                <div id="search_list"></div>
                <a href="{{ route('anggota.create') }}" class="btn btn-success text-nowrap">Tambah Data</a>
            </form>
        </div>
    </nav>


    <div class="table-responsive-sm">
        <table class="table table-stripped table-bordered mt-3">
            <thead class="table-warning text-center align-middle fw-semibold">
                <td>No</td>
                <td>Nama</td>
                <td>Kelas</td>
                <td>Jurusan</td>
                <td>Email</td>
                <td>Jenis Kelamin</td>
                <td>Tanggal Daftar</td>
                <td style="width: 15rem;">Aksi</td>
            </thead>
            <tbody>
                @foreach ($student as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->kelas }}</td>
                        <td>{{ $data->jurusan }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->jenis_kelamin }}</td>
                        <td>{{ $data->created_at->format('d-m-Y') }}</td>
                        <td class="justify-content-center gap-3 d-flex">
                            <button type="button" class="btn btn-warning btn-sm fw-semibold" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Detail
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <ul>
                                                <li>Nama: </li>
                                                <li>Kelas: </li>
                                                <li>Jurusan: </li>
                                                <li>Email: </li>
                                                <li>Jenis Kelamin: </li>
                                                <li>No. Telepon: </li>
                                                <li>Tanggal Lahir: </li>
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('anggota.edit', $data->id) }}"
                                class="btn btn-primary btn-sm fw-semibold">Edit</a>
                            <form id="delete-form" action="{{ route('anggota.destroy', $data->id) }}" method="POST"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="confirmDelete(event)"
                                    class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                            <script>
                                function confirmDelete(event) {
                                    event.preventDefault();
                                    Swal.fire({
                                        title: 'Yakin hapus data  ',
                                        text: "You won't be able to revert this!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#d33',
                                        cancelButtonColor: '#3085d6',
                                        confirmButtonText: 'Yes, delete it!'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            document.getElementById("delete-form").submit();
                                        }
                                    })
                                }
                            </script>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
                    $('search').on('keyup', function() {
                            var value = $(this).val();
                            $.ajax({
                                url: 'search',
                                type: 'get',
                                data: {
                                    'search': query
                                },
                                success: function(data) {
                                    $('tbody').html(data);
                                }
                            });
                        }
                    })
    </script>
@endsection

@extends('layouts.app')

@section('content')

    <nav class="navbar ">
        <div class="container">
            <h4 class=" fw-semibold">Data Anggota</h4>
        <form class="d-flex">
            <input class="form-control me-2" type="search" id="search" placeholder="Cari Data" aria-label="Search" style="background-color: #eaeaea">
            <div id="search_list"></div>
            <a href="{{ route('anggota.create') }}" class="btn btn-success text-nowrap">Tambah Data</a>
        </form>
        </div>
    </nav>


    <div class="table-responsive-sm">
        <table class="table table-stripped table-bordered mt-3">
            <thead class="table-warning text-center align-middle">
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>No. HP</th>
                <th>Tanggal Lahir</th>
                <th>Aksi</th>
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
                        <td>{{ $data->no_hp }}</td>
                        <td>{{ $data->tgl_lahir }}</td>
                        <td style="width: 12rem;">
                            <a href="#" class="btn btn-warning btn-sm fw-semibold">Detail</a>
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
        $(document).ready(function(){
            $('search').on('keyup', function(){
                var value = $(this).val();
                $.ajax({
                    url : 'search',
                    type : 'get',
                    data:{'search':query},
                    success:function(data){
                        $('tbody').html(data);
                    }
                });
            }
        })
    </script>
@endsection

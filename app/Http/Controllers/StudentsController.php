<?php

namespace App\Http\Controllers;

use App\Models\Student;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        $student = Student::all();
        $title = 'Home';
        return view('anggota.index', compact('student', 'title'));
    }

    public function create()
    {
        $title = 'Tambah Data';
        return view('anggota.create', compact('title'));
    }

    public function store(Request $request)
    {
        Student::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'tgl_lahir' => $request->tgl_lahir,

        ]);

        // return redirect()->route('anggota.index');
        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('anggota.edit', compact('student'));
        // dd($student);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'tgl_lahir' => $request->tgl_lahir,
        ]);

        // return redirect()->route('anggota.index');
        return redirect()->back()->with('success', 'Data berhasil diupdate.');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect()->route('anggota.index');
    }
}

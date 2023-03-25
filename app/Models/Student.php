<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kelas',
        'jurusan',
        'email',
        'jenis_kelamin',
        'no_hp',
        'tgl_lahir',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['nis', 'password', 'nama', 'kelas', 'username_ujian', 'password_ujian', 'enable'];
}

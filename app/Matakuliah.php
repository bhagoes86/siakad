<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $fillable = ['kode_mk','makul','sks'];
    protected $table = 'mata_kuliah';
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jurusan;

class Jurusan extends Model
{
    protected  $table = 'jurusan';

    protected $fillable = ['name', 'fakultas_id'];

    public function fakultas()
    {
    	return $this->belongsTo(Fakultas::class, 'fakultas_id', 'id');
    }
}

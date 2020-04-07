<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
   protected  $table = 'ruangan';
protected $primaryKey = 'id_ruangan';
    protected $fillable = ['nama_ruangan', 'jurusan_id'];

    public function jurusan()
    {
    	return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id');
    }
     public function barang()
    {
    	return $this->belongsTo(Barang::class, 'ruangan_id', 'id_ruangan');
    }
}

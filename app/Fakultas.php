<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $table = 'fakultas';
    protected $primaryKey = 'id_fakultas';

    protected $fillable = ['nama_fakultas'];

     public function jurusan()
    {
    	return $this->belongsTo(Jurusan::class, 'fakultas_id', 'id_fakultas');
    }
}

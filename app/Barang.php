<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
       	protected  $table = 'barang';
		protected $primaryKey = 'id_barang';
    	protected $fillable = ['nama_barang', 'ruangan_id', 'total','broken'];
    	  public function ruangan()
    {
    	return $this->belongsTo(Ruangan::class, 'ruangan_id', 'id_ruangan');
    }
}

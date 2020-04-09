<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//created_by & updated_by
class Barang extends Model
{
       	protected  $table = 'barang';
		protected $primaryKey = 'id_barang';
    	protected $fillable = ['nama_barang', 'ruangan_id', 'total','broken', 'created_by', 'updated_by'];
    public function ruangan()
    {
    	return $this->belongsTo(Ruangan::class, 'ruangan_id', 'id_ruangan');
    }
     public function created_updated()
    {
    	return $this->belongsTo(User::class, 'created_by' , 'id');
    }
      public function updated_created()
    {
    	return $this->belongsTo(User::class, 'updated_by' , 'id');
    }
}

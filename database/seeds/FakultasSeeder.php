<?php

use Illuminate\Database\Seeder;
use App\Fakultas;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listFakultas = ['Filkom', 'Vokasi', 'Hukum','Ilmu Administrasi', 'Kedokteran', 'Peternakan','Teknik', 'Bahasa Dan Sastra', 'Perairan', 'Seni Budaya' ];

        foreach ($listFakultas as $fakultas) {
        	Fakultas::create(['nama_fakultas' => $fakultas]);
        }
    }
}

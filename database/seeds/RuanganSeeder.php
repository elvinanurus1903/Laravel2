<?php

use Illuminate\Database\Seeder;
use App\Ruangan;
class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Factory(App\Ruangan::class,10)->create();
    }
}

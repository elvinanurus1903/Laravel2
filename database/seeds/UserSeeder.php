<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  public function run()
    {
        $role = ['admin', 'staff' ];

         foreach ($role as $role) {
        	Factory(App\User::class,10)->create(['role' => $role]);
        }
    }
}

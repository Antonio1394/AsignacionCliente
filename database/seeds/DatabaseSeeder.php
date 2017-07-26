<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

             $this->call(TipoTableSeeder::class);
             $this->call(UserTableSeeder::class);
             factory('App\Models\Cliente', 150)->create();

        Model::reguard();
    }
}

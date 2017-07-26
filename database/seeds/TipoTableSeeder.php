<?php

use Illuminate\Database\Seeder;
use App\Models\TipoUsuario;

class TipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo= new TipoUsuario;
        $tipo->tipo='admin';
        $tipo->save();

        $tipo= new TipoUsuario;
        $tipo->tipo='vendedor';
        $tipo->save();
    }
}

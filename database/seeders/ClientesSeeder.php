<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;  // Asegúrate de importar el modelo

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Cliente::factory(10)->create();
    }
}

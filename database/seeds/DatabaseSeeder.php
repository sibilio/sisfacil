<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(EmpresaSeeder::class);
        $this->call(TipoAparelhoSeeder::class);
        $this->call(TipoServicoSeeder::class);
        $this->call(OrdemServicoSeeder::class);
    }
}

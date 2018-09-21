<?php

use Illuminate\Database\Seeder;
use \App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->email = "sibiliojr@gmail.com";
        $user->idEmpresa = 1;
        $user->name = "Marcos Sibilio Jr.";
        $user->password = bcrypt('qw743926');
        $user->save();

        $user = new User;
        $user->email = "elainedsibilio@gmail.com";
        $user->idEmpresa = 1;
        $user->name = "Elaine D. Sibilio";
        $user->password = bcrypt('m74g00');
        $user->save();
    }
}

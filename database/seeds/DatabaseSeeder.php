<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(LaratrustSeeder::class);
        $this->call(UsersTableSeeder::class);
    }//end of run
}//end of class

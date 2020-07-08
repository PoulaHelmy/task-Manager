<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=\App\Models\User::create([
            'name'=>'super_admin',
            'email'=>'super_admin@app.com',
            'password'=>\Illuminate\Support\Facades\Hash::make('123456')
        ]);
        $user->attachRole('super_admin');
    }//end of run
}//end of class

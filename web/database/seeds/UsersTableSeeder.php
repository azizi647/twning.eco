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
        // Create a user, and give roles

        App\User::truncate();
        App\User::create([
            'name' => 'Vusal Orujov',
            'role_id' => '1',
            'email' => 'vusaltrue@gmail.com',
            'password' => bcrypt('Vuser317@'),
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        // ---------------
        App\User::create([
            'name' => 'Aziz Azizli',
            'role_id' => '1',
            'email' => 'aziz@azizli.com',
            'password' => bcrypt('azizi647'),
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

    }
}

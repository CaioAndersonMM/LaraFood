<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Caio Anderson',
            'email' => 'caio@especialati.com.br',
            'password' => bcrypt('1234567'),
        ]);
    }
}
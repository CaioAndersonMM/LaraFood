<?php

use App\Models\{
    User,
    Tenant
};
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
        $tenant = Tenant::first();

        $tenant->users()->create([
            'name' => 'Caio Anderson',
            'email' => 'caio@especialati.com.br',
            'password' => bcrypt('1234567'),
        ]);
    }
}

<?php

use App\Models\{
    Tenant,
    Plan,
};
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

        $plan->tenants()->create([
            'cnpj' => '12783352000140',
            'name' => 'EspecializaTI',
            'url' => 'especializati',
            'email' => 'carlos@especializati.com.br',
        ]);
    }
}

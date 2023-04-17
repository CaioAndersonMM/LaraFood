<?php

namespace App\Services;


use App\Models\Plan;

class TenantService{
    private $plan, $data = [];

    public function make(Plan $plan, array $data){
        $this->plan = $plan;
        $this->data = $data;
        $tenant = $this->storeTenant();
        $user = $this->storeUser($tenant);

        return $user;
    }

    public function storeTenant(){
        $data = $this->data;

        return $this->plan->tenants()->create([
            'name' => $data['empresa'], //o campo que recebe o nome da empresa no form
            'cnpj' => $data['cnpj'],
            //campo url foi tirado, será criado agora no Observer | assim como o uuid
            'email' => $data['email'],

            'subscription' => now(),
            'expires_at' => now()->addDays(7),
        ]);
    }
    public function storeUser($tenant){
        $user = $tenant->users()->create([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'password' => bcrypt($this->data['password']),
        ]);

        return $user;
    }
}
 
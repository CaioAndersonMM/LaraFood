<?php
namespace App\Tenant;

use App\Models\Tenant;

class ManagerTenant{
    public function getTenantIdentify() : int{
        return auth()->user()->tenant_id; //função p obter o id do tenant do usuario autenticado
    }

    public function getTenant() : Tenant{
        return auth()->user()->tenant; //função p obter o objeto tenant do usuario autenticado
    }

    public function isAdmin() : bool{
        return in_array(auth()->user()->email, config('tenant.admins')); //se o usuário autenticado estiver nos admins configurados no arquivo tenant.
    }
}
<?php
namespace App\Tenant\Scopes;

use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TenantScope implements Scope{
     /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        //$managerTenant = app(ManagerTenant::class); 
        $builder->where('tenant_id', app(ManagerTenant::class)->getTenantIdentify()); //criando scope - filtro de id; 
                                                                                    //tenant_id onde = obtendo id do tenant
    }
}
<?php

namespace App\Tenant\Traits;
use App\Tenant\Observers\TenantObserver;
use App\Tenant\Scopes\TenantScope;

trait TenantTrait{
      /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::observe(TenantObserver::class); //quando uma nova categoria for feita, esse observer será chamado (scope global)

        static::addGlobalScope(new TenantScope); //utiliza o scopo global nas categorias
    }
}
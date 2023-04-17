<?php

namespace App\Models;
use App\Tenant\Traits\TenantTrait;
use App\Tenant\Observers\TenantObserver;
//tava usando o TenantObserver fora do diretório Tenant, por isso dava erro
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use TenantTrait;
    protected $fillable = ['name', 'url', 'description'];

}

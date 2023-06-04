<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'description'];

    /*
    *   Get Plans
    */
    public function plans(){
        return $this->belongsToMany(Plan::class); //relacionamento n para n com planos
    }



    /*
    *   Get Permission
    */
    public function permission(){
        return $this->belongsToMany(Permission::class); //relacionamento n para n com permission
    }


    /**
     * Permissões not linked with this Perfis
     */
    public function permissionsAvailable($filter = null)
    {
        $permissions = Permission::whereNotIn('permissions.id', function($query) {
            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.profile_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter) {
            if ($filter)
                $queryFilter->where('permissions.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $permissions;
    }


}

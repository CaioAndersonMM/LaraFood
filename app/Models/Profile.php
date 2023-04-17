<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'description'];

    
    /*
    *   Get Permission
    */
    public function permission(){
        return $this->belongsToMany(Permission::class); //relacionamento n para n com permission
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'description'];


    /*
    *   Get Permission
    */
    public function profiles(){
        return $this->belongsToMany(Profile::class); //relacionamento n para n com profile
    }
}

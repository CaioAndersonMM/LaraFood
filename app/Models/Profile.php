<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'description'];

    // public function search($filter = null){
    //     $result = $this
    //         ->where('name','LIKE', "%{$filter}%")
    //         ->orWhere('description','LIKE', "%{$filter}%")
    //         ->paginate(5); 
    //     return $result;
    // }

}

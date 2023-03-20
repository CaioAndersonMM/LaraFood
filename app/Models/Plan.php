<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['name', 'url', 'description', 'price'];

    public function details(){
        return $this->hasMany(DetailPlan::class); //relacionamento um pra muitos
    }

    public function search($filter = null){
        $result = $this
            ->where('name','LIKE', "%{$filter}%")
            ->orWhere('description','LIKE', "%{$filter}%")
            ->paginate(5); 
        return $result;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['name', 'url', 'description', 'price'];

    public function details(){
        return $this->hasMany(DetailPlan::class); //relacionamento um pra muitos
    }

    public function profiles(){
        return $this->belongsToMany(Profile::class);
    }

    public function tenants(){
        return $this->hasMany(Tenant::class);
    }

    public function search($filter = null){
        $result = $this
            ->where('name','LIKE', "%{$filter}%")
            ->orWhere('description','LIKE', "%{$filter}%")
            ->paginate(5); 
        return $result;
    }


    //Perfis não vinculados ao planos
    public function profilesAvailable($filter = null)
    {
        $profiles = Profile::whereNotIn('profiles.id', function($query) {
            $query->select('plan_profile.profile_id');
            $query->from('plan_profile');
            $query->whereRaw("plan_profile.plan_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter) {
            if ($filter)
                $queryFilter->where('profiles.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $profiles;
    }


}

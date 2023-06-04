<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Profile;
use Illuminate\Http\Request;

class PlanProfileController extends Controller
{
    protected $profile, $plan;

    public function __construct(Profile $profile, Plan $plan)
    {
        $this->profile = $profile;
        $this->plan = $plan;
    }

    public function profiles($idPlan){
        if(!$plan = $this->plan->find($idPlan)){
            return redirect()->back();
        }

        $profiles = $plan->profiles()->paginate();

        return view('admin.pages.plans.profiles.profiles', compact('plan', 'profiles'));
    }

    public function plans($idProfile){

        if(!$profile = $this->profile->find($idProfile)){
            return redirect()->back();
        }

        $plans = $profile->plans()->paginate();

        return view('admin.pages.profiles.plans.plans', compact('profile', 'plans'));
    }




    public function profilesAvailable(Request $request, $idPlan){
        if(!$plan = $this->plan->find($idPlan)){
            return redirect()->back();
        }

        $filters = $request->except('_token');
        $profiles = $plan->profilesAvailable($request->filter);

        return view('admin.pages.plans.profiles.available', compact('profiles', 'plan', 'filters'));
    }

    public function vincularProfilesPlan(Request $request, $idPlan){
        if(!$plan = $this->plan->find($idPlan)){
            return redirect()->back();
        }

        //validação 
        if(!$request->profiles || count($request->profiles) == 0){
            return redirect()
                ->back()
                ->with('message', 'Você deve escolher pelos menos um perfil!');
        }

        $plan->profiles()->attach($request->profiles);

        return redirect()->route('plans.profiles', $plan->id);
    }

    public function desvincularProfilesPlan($idPlan, $idProfile){
        $plan = $this->plan->find($idPlan);
        $profile = $this->profile->find($idProfile);


        if(!$plan || !$profile){
            return redirect()->back();
        }

        $plan->profiles()->detach($profile);

        return redirect()->route('plans.profiles', $plan->id);
    }



}

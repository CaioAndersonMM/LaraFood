<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){

        $plans = Plan::with('details')->orderBy('price', 'DESC')->get();
        //com o with() eu trago os detalhes do plano - relacionamento

        return view('site.pages.home.index', compact('plans'));
    }
    public function plan($id){
        if(!$plan = Plan::where('id', $id)->first()){
            return redirect()->back();
        }
        session()->put('plan', $plan);
        return redirect()->route('register');
    }
}

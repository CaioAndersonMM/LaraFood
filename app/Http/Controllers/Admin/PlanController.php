<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdate;
use App\Models\Plan;
use Illuminate\Http\Request;
//use Illuminate\Support\Str;

class PlanController extends Controller
{
    private $repository;

    public function __construct(Plan $plan){
        //o maldito precisa de duas underlines
        $this->repository = $plan;
    }

    public function index(){
        $plans = $this->repository->latest()->paginate();
        return view('admin.pages.plans.index', [
            'plans' => $plans,
        ]);
    }

    public function create(){
        return view('admin.pages.plans.create');
    }

    public function store(StoreUpdate $request){
        //$data = $request->all(); //dados que vem do formulário entrando em uma variavel
        //comitei já que estamos passando tudo do request direto no create()

        //$data['url'] = Str::kebab($request->name); //Já que o url não é dado no form, aqui criamos um
        //comentei já que estamos fazendo isso no observer.
        $this->repository->create($request->all()); 
        return redirect()->route('planos.index');
    }
    public function show($id){
        $plan = $this->repository->where('id', $id)->first();

        if(!$plan) //se o plano não for encontrado
            return redirect()->back();

        return view('admin.pages.plans.show', [
            'plan' => $plan,
        ]);
    }
    public function destroy($id){
        $plan = $this->repository
                        ->with('details')
                        ->where('id', $id)
                        ->first();

        if(!$plan)
            return redirect()->back();

        if($plan->details->count() > 0){
            return redirect()->back()
                             ->with('error', 'Existem detalhes vinculados ao plano, ele não pode ser excluido!');
        }

        $plan->delete(); //deletando

        return redirect()->route('planos.index');
    }

    public function search(Request $request){
        //$plan = $this->repository->where('name','LIKE', "%{$request->filter}%")->orWhere('description', 'LIKE', "%{$request->filter}%");

        $filter = $request->except('_token');
        $plan = $this->repository->search($request->filter); //chamando a função criada no model

        
        return view('admin.pages.plans.index', [
            'plans' => $plan,
            'filters' => $filter,
        ]);
    }

    public function edit($id){
        $plan = $this->repository->where('id', $id)->first();

        if(!$plan)
        return redirect()->back();

        return view('admin.pages.plans.edit', [
            'plans' => $plan,
        ]);
    }
    public function update(StoreUpdate $request){
        $plan = $this->repository->where('id', $request->id)->first();

        $plan->update($request->all());

        return redirect()->route('planos.index');
    }
}

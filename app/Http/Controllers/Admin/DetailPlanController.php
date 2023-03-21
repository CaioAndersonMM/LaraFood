<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateDetailPlan;
use App\Models\Plan;
use App\Models\DetailPlan;

class DetailPlanController extends Controller
{
    private $repository;
    private $plan; //pegando um 'repositório' de model plan

    public function __construct(DetailPlan $detailPlan, Plan $plan){
        $this->repository = $detailPlan;
        $this->plan = $plan;
    }
     
    public function index($id){
        if(!$plan = $this->plan->where('id', $id)->first()){
            //se não for encontrado esse plano com esse id - esse if já está criando a variavel $plan
            return redirect()->back();
        }

        //$details = $plan->details();
        $details = $plan->details()->paginate();

        return view('admin.pages.plans.details.index', [
            'details' => $details,
            'plan' => $plan,
        ]);
       
    }
    public function create($id){

        if(!$plan = $this->plan->where('id', $id)->first()){
            return redirect()->back();
        }
        return view('admin.pages.plans.details.create', [
            'plan' => $plan,
        ]);
    }
    
    public function store(StoreUpdateDetailPlan $request, $id){
        if(!$plan = $this->plan->where('id', $id)->first()){
            return redirect()->back();
        }

        //$data = $request->all();
        //$data['plan_id'] = $plan->$id;
        //$this->repository->create($data); 
        // ou

        $plan->details()->create($request->all());

        return redirect()->route('details.planos.index', $plan->id);
    }

    public function edit($id, $idDetail){
        if(!$plan = $this->plan->where('id', $id)->first()){
            return redirect()->back();
        }
       
        if(!$detail = $this->repository->find($idDetail)){
            return redirect()->back();
        }
        
        //$detail = $this->repository->where('plan_id', $plan->id);

        return view('admin.pages.plans.details.edit', [
            'detail' => $detail,
            'plan' => $plan,
        ]);

    }
    
    public function update(StoreUpdateDetailPlan $request, $id, $idDetail){
        if(!$plan = $this->plan->where('id', $id)->first()){
            return redirect()->back();
        }
       
        if(!$detail = $this->repository->find($idDetail)){
            return redirect()->back();
        }
        
        $detail->update($request->all());

        return redirect()->route('details.planos.index', $plan->id);
    }

    public function show($id, $idDetail){
        if(!$plan = $this->plan->where('id', $id)->first()){
            return redirect()->back();
        }
       
        if(!$detail = $this->repository->find($idDetail)){
            return redirect()->back();
        }
        
        //$detail = $this->repository->where('plan_id', $plan->id);

        return view('admin.pages.plans.details.show', [
            'detail' => $detail,
            'plan' => $plan,
        ]);
    }

    public function destroy($id, $idDetail){
        if(!$plan = $this->plan->where('id', $id)->first()){
            return redirect()->back();
        }
        if(!$detail = $this->repository->find($idDetail)){
            return redirect()->back();
        }
        $detail->delete();
        return redirect()->route('details.planos.index', $plan->id)
        ->with('message', 'Registro deletado com sucesso!'); //não criei o alerta dessa mensagem
    }

}

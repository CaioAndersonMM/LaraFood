<?php

namespace App\Observers;

use App\Models\Plan;
use Illuminate\Support\Str;
class PlanObserver
{
    /**
     * Handle the plan "created" event.
     *
     * @param  \App\Models\Plan  $plan
     * @return void
     */
    public function creating(Plan $plan)
    {
        //quando estiver criando o plan repassa o campo url;
        $plan->url = Str::kebab($plan->name);
    }

    /**
     * Handle the plan "updated" event.
     *
     * @param  \App\Models\Plan  $plan
     * @return void
     */
    public function updating(Plan $plan)
    {
        //quando estiver atualizando o plan repassa o campo url;
        $plan->url = Str::kebab($plan->name);
    }

    /**
     * Handle the plan "deleted" event.
     *
     * @param  \App\Models\Plan  $plan
     * @return void
     */
}

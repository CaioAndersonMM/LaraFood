<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductObserver
{
    /**
     * Handle the product "creating" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function creating(Product $product)
    {
        //quando estiver criando o product repassa o campo url;
        $product->flag = Str::kebab($product->title);
    }

    /**
     * Handle the product "updating" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updating(Product $product)
    {
        //quando estiver atualizando o product repassa o campo url;
        $product->flag = Str::kebab($product->title);
    }
}

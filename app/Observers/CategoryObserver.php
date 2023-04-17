<?php

namespace App\Observers;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
        /**
     * Handle the category "created" event.
     *
     * @param  \App\Models\Category $category
     * @return void
     */
    public function creating(Category $category)
    {
        //quando estiver criando a categoria repassa o campo url;
        $category->url = Str::kebab($category->name);
    }

        /**
     * Handle the category "updating" event.
     *
     * @param  \App\Models\Category $category
     * @return void
     */
    public function updating(Category $category)
    {
        //quando estiver criando a categoria repassa o campo url;
        $category->url = Str::kebab($category->name);
    }

}

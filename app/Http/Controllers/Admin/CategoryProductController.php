<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryProductontroller extends Controller
{
    protected $product, $category;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function categories($idProduct){
        if(!$product = $this->product->find($idProduct)){
            return redirect()->back();
        }

        $category = $product->categories()->paginate();

        return view('admin.pages.products.categories.categories', compact('product', 'category'));
    }

    public function products($idCategory){
        if(!$category = $this->category->find($idCategory)){
            return redirect()->back();
        }

        $product = $category->products()->paginate();

        return view('admin.pages.categories.products.products', compact('product', 'category'));
    }

    public function categoriesAvailable(Request $request, $idProduct){
        if(!$product = $this->product->find($idProduct)){
            return redirect()->back();
        }

        $filters = $request->except('_token');
        $categories = $product->categoriesAvailable($request->filter);

        return view('admin.pages.products.categories.available', compact('categories', 'product'));
    }



}

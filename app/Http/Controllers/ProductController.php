<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Category;
use \App\Subcategory;
use \App\Product;

class ProductController extends Controller
{
    public function index(){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $products = Product::all();
        return view('cms.products', compact('categories', 'subcategories', 'products'));
    }

    public function createPage(){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $products = Product::all();
        return view('cms.createproduct', compact('categories', 'subcategories', 'products'));
    }

    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
//        $body = view('dashboard.products.create', compact('categories'));
//        return view('dashboard.index', compact('body'));
    }

    public function store(){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $product = new Product;
        $product->name = request('name');
        $product->price = request('price');
        $product->description = request('desc');
        foreach($categories as $category){
            if($category->name == request('cat')){
                $product->categories_id = $category->id;
            }
        }
        foreach($subcategories as $subcategory){
            if($subcategory->name == request('sub')){
                $product->subcategories_id = $subcategory->id;
            }
        }
        $product->imageurl = request('img');

        $product->save();

        return redirect('/cms/products');
    }
}
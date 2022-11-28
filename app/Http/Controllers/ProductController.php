<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //показать все товары
    public function index()
    {
        $products = Product::All();
        return view('product.index')->with('products', $products);
    }

    //показать форму добавления товара
    public function create()
    {
        $categories = Category::all();
        return view('product.create')->with('categories', $categories);
    }

    //добавление нового товара в БД
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:25', 
            'price' => 'required', 
            'category' => 'required' 
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->category = $request->input('category');
        $product->save(); 
        return redirect('/products/create')->with('success', 'Товар добавлен');
    }

    //показать информацию о товаре
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show')->with('product', $product);
    }

    //показать форму изменения информации о товаре
    public function edit($id)
    {
        $product = Product::find($id);                                    //находим нужный това
        $categories = Category::All();                                    
        return view('product.edit')->with('product', $product)->with('categories', $categories);
    }

    //обновить информацию о товаре в БД
    public function update(Request $request, $id)
    { 
        $this->validate($request, [
            'name' => 'required|min:3|max:25', 
            'price' => 'required', 
            'category' => 'required' 
        ]);

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->category = $request->input('category');
        $product->save();
        return redirect("products/$id/edit")->with('success', 'Товар обновлен');
    }

    //удалить товар
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('products')->with('success', 'Товар удален');
    }
}

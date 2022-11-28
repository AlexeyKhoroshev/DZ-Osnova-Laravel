<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //показать все категории (если includeProducts == 1 - со всеми вложенными товарами)
    public function index()
    {
        $categories = Category::All();                                                                  //находим все категории
        

        if (isset($_GET['includeProducts']) AND $_GET['includeProducts'] == 1) {
            $products = Product::All();
            return view('category.index')->with('categories', $categories)->with('products', $products);
        }
        else return view('category.index')->with('categories', $categories);
    }

    //показать форму добавления категории 
    public function create()
    {
        $categories = Category::all();
        return view('category.create')->with('categories', $categories);
    }

    //добавление новой категории в БД
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:25', 
            'parent_id' => 'required' 
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->parent_id = $request->input('parent_id');
        $category->save();
        return redirect('/categories/create')->with('success', 'Категория добавлена');

    }

    //показать название категории № $id (если includeProducts == 1 - показать еще вложенные товары)
    public function show($id)
    {
        $category = Category::find($id);                                                           //находим нужную категорию
        if (isset($_GET['includeProducts']) AND $_GET['includeProducts'] == 1) {                      
            $products = Product::where('category', $id)->get();                                    //находим все торвары с данной категории
            return view('category.show')->with('category', $category)->with('products', $products);
        }
        else return view('category.show')->with('category', $category);
    }

    //показать список товаров категории № $id (если includeChildren == 1 - отобразить так же товары из вложенных категорий)   
    public function showProducts($id)
    {   
        if (isset($_GET['includeChildren']) AND $_GET['includeChildren'] == 1) {
            //найдем все товары в данной категории и во вложенных категориях
            $productsOfCategoryIncludingNested = DB::select("SELECT products.name AS name FROM products 
                                                             JOIN categories 
                                                             ON products.category = categories.id
                                                             WHERE categories.parent_id = '$id' OR categories.id = '$id'");
            return view('category.show')->with('products', $productsOfCategoryIncludingNested);
        }
        else {
            $products = Product::where('category', $id)->get();                                    //находим все торвары с данной категории
            return view('category.show')->with('products', $products);   
        }
        
        
    }    

    //показать форму изменения категории
    public function edit($id)
    {
        $category = Category::find($id);                                    //находим нужную категорию
        $categories = Category::All();                                    
        return view('category.edit')->with('category', $category)->with('categories', $categories);
    }

    //отредактировать категорию в БД
    public function update(Request $request, $id)
    { 
        $this->validate($request, [
            'name' => 'required|min:3|max:25', 
            'parent_id' => 'required' 
        ]);

        $category = Category::find($id);
        $category->name = $request->input('name');                                     //$request - данные полученные из формы
        $category->parent_id = $request->input('parent_id');
        $category->save();
        return redirect("categories/$id/edit")->with('success', 'Категория обновлена');

    }

    //удалить категорию
    public function destroy($id)
    {
        //
    }
}

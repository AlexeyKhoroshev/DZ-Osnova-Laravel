@extends('main')

@section('page-title')
Изменение товара
@endsection

@section('content')
            
<h2>изменение товара №{{$product->id}}</h2>     
            <div> 
                 {{-- Форма изменения товара --}}
                 <form action='{{asset("products/$product->id")}}' method="post">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf 
                     <input type="text"   name="name"     placeholder="Название товара"  value="{{$product->name}}">
                     <input type="text"   name="price"    placeholder="Цена товара"      value="{{$product->price}}">
                     <select name="category" i>
                         <option value="">Категория</option>
                         @foreach ($categories as $category)
                             <option value="{{$category->id}}" @if ($product->category == $category->id) selected @endif >
                                {{$category->name}}
                            </option>
                         @endforeach
                     </select>

                     <input type="submit" value="Изменить товар">
                 </form>
                 {{-- Форма удаления товара --}}
                 <br>
                 <form action='{{asset("products/$product->id")}}' method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    @csrf 
                    <input type="submit" value="Удалить товар">
                </form>
                 
            </div>

     
@endsection
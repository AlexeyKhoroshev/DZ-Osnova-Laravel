@extends('main')

@section('page-title')
Добавление товара
@endsection

@section('content')
            
<h2>Добавление товара</h2>
            <div>
                 <form action="{{asset('products')}}" method="post">
                    @csrf 
                     <input type="text"   name="name"     placeholder="Название товара"  value="{{ old('name') }}">
                     <input type="text"   name="price"    placeholder="Цена товара"      value="{{ old('price') }}">
                     <select name="category" i>
                         <option value="">Категория</option>
                         @foreach ($categories as $category)
                             <option value="{{$category->id}}">{{$category->name}}</option>
                         @endforeach
                     </select>

                     <input type="submit" value="Добавить товар">
                 </form>
                 
            </div>

     
@endsection
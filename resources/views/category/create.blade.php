@extends('main')

@section('page-title')
Добавление товара
@endsection

@section('content')
            
<h2>Добавление категории</h2>
            <div>
                 <form action="{{asset('categories')}}" method="post">
                    @csrf 
                     <input type="text"   name="name"     placeholder="Название товара"  value="{{ old('name') }}">
                     <select name="parent_id" i>
                         <option value="0">Категория</option>
                         @foreach ($categories as $category)
                             <option value="{{$category->id}}">{{$category->name}}</option>
                         @endforeach
                     </select>

                     <input type="submit" value="Добавить категорию">
                 </form>
                 
            </div>

     
@endsection
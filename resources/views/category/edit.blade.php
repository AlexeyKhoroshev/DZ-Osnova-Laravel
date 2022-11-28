@extends('main')

@section('page-title')
Изменение категории
@endsection

@section('content')
            
<h2>Изменение категории №{{$category->id}}</h2>

<div>  
    <form action='{{asset("categories/$category->id")}}' method="post">
       <input type="hidden" name="_method" value="PUT">
       @csrf 
       Название категории
        <input type="text"   name="name"     placeholder="Название товара"  value="{{$category->name}}">; 
        Родитель
        <select name="parent_id" i>
            <option value="0">Отсутствует</option>
            @foreach ($categories as $el)
                @if ($el->name != $category->name)      {{--родитель не может быть собой--}}
                    <option value="{{$el->id}}" @if ($el->id == $category->parent_id) selected @endif >
                    {{$el->name}}
                </option>                   
                @endif
            @endforeach
        </select>

        <input type="submit" value="изменить категорию">
    </form>    
</div>    



     
@endsection
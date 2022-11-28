@extends('main')

@section('page-title')
Товары
@endsection

@section('content')
           

            <div>
               @isset($category)
               Категория №{{$category->id}} - {{$category->name}}</p>
               @endisset  
                 
                 @isset($products)
                 <p>Товары в данной категории:</p>
                    @foreach ($products as $product)
                         {{$product->name}} <br>
                    @endforeach
                 @endisset
            </div>

     
@endsection
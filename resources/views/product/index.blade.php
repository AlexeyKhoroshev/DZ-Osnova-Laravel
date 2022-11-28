@extends('main')

@section('page-title')
Товары
@endsection

@section('content')
         
          @foreach ($products as $product)
            <div> <p> Товар №{{$product->id}} - {{$product->name}} &#91;
                      Цена:{{$product->price}} рублей &#93; 
                      <a href="products/{{$product->id}}/edit">(изменить)</a></p>
                 
            </div>
          @endforeach
     
@endsection
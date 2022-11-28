@extends('main')

@section('page-title')
Категории товаров
@endsection

@section('content')

          @foreach ($categories as $category)                                      
            <div>
                <p> Категория №{{$category->id}} - {{$category->name}}:  <a href="categories/{{$category->id}}/edit">(изменить)</a>
                 

                 @if(isset($_GET['includeProducts']) AND ($_GET['includeProducts']==1)) {{-- выводим продукты, принадлежащие категории--}}
                    &#91;
                    @foreach ($products as $product)
                     @if ($product->category == $category->id)
                       {{$product->name}};
                     @endif                 
                    @endforeach 
                    &#93;
                 @endif

                </p>
            </div>
          @endforeach
          

@endsection
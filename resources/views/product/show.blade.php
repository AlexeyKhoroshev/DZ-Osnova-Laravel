@extends('main')

@section('page-title')
Товар
@endsection

@section('content')
            

            <div>
                 <h2>{{$product->id}}</h2>
                 <p>{{$product->name}}</p>
                 <p><b>Цена: </b>{{$product->price}} рублей</p>
                 
            </div>

     
@endsection
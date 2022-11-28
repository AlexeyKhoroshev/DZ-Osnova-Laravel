<div>
<h1> Меню </h1>
<b><a href="{{asset('categories')}}">Все категории</a></b><br>
<b><a href="{{asset('products')}}">Все товары</a></b><br>

<b><a href="{{asset('categories?includeProducts=1')}}">Список категорий с вложенными товарами</a></b><br>
<b><a href="{{asset('categories/1?includeProducts=1')}}">Одна категория с вложенными товарами</a></b><br>
<b><a href="{{asset('categories/1/products')}}">Список товаров в категории</a></b><br>
<b><a href="{{asset('categories/1/products?includeChildren=1')}}">Список товаров в категории и во всех вложенных категориях</a></b><br>

<b><a href="{{asset('categories/create')}}">Добавить категорию</a></b><br>
<b><a href="{{asset('products/create')}}">Добавить товар</a></b><br>

<hr size="1">
</div>
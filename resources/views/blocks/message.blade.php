@if (count($errors) > 0)
     @foreach ($errors->all() as $el)                {{--   цикл вывода ошибок валидации    --}}
        <div style="color:red"> - {{ $el }}</div>
    @endforeach
@endif

@if (session('success'))
    <div style="color:green"> {{ session('success') }} </div>
@endif
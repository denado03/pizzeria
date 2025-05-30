<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Продукты</title>
</head>
<body>
<a href="{{route('admin.dashboard')}}">Назад</a>
<h3>Продукты</h3>
<div>
    <a href="{{route('admin.products.create')}}">Добавить продукт</a>
    <hr>
</div>


<div>
    @foreach($products as $product)
        <div>
            <div>Название: {{$product->name}}</div>
            <div>Описание: {{$product->description}}</div>
            <div>Цена: {{$product->price}}</div>
            <div>Тип товара: {{$product->type->name}}</div>
            <div>
            <a href="{{route('admin.products.edit', $product->id)}}">Редактировать</a>
            <div>
                <form action="{{route('admin.products.delete', $product->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Удалить">
                </form>
            </div>
            </div>
        </div>
        <hr>
    @endforeach
</div>
</body>
</html>

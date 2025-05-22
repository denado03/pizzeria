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
<h3>Продукты</h3>
<div>
    <a href="">Добавить продукт</a>
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
            <a href="">Редактировать</a>
            <a href="">Удалить</a>
            </div>
        </div>
        <hr>
    @endforeach
</div>
</body>
</html>

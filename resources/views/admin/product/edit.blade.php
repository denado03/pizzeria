<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
</head>
<body>
<a href="{{route('admin.products.index')}}">Назад</a>

<form method="post" action="{{route('admin.products.update', $product->id)}}">
    @csrf
    @method('Put')
    <label for="name">Название</label>
    <br>
    <input type="text" name="name" value="{{$product->name}}">
    @error('name')
    {{$message}}
    @enderror
    <br>
    <label for="description">Описание</label>
    <br>
    <input type="text" name="description" value="{{$product->description}}">
    @error('description')
    {{$message}}
    @enderror
    <br>
    <label for="price">Цена</label>
    <br>
    <input type="text" name="price" value="{{$product->price}}">
    @error('price')
    {{$message}}
    @enderror
    <br>
    <label for="name">Тип продукта</label>
    <br>
    <select name="type_id" id="">
        <option disabled>Выберите тип</option>
        @foreach($types as $type)
            <option value="{{ $type->id }}" {{$product->type_id == $type->id ? 'selected' : ''}} >
                {{ $type->name }}
            </option>
        @endforeach
    </select>
    @error('type_id')
    {{$message}}
    @enderror
    <p><button type="submit">Сохранить</button></p>
</form>
</body>
</html>

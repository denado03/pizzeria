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
<form method="post" action="{{route('admin.products.store')}}">
    @csrf
    <label for="name">Название</label>
    <br>
    <input type="text" name="name" value="{{old('name')}}">
    @error('name')
    {{$message}}
    @enderror
    <br>
    <label for="description">Описание</label>
    <br>
    <input type="text" name="description" value="{{old('description')}}">
    @error('description')
    {{$message}}
    @enderror
    <br>
    <label for="price">Цена</label>
    <br>
    <input type="text" name="price" value="{{old('price')}}">
    @error('price')
    {{$message}}
    @enderror
    <br>
    <label for="name">Тип продукта</label>
    <br>
    <select name="type_id" id="">
        <option disabled selected>Выберите тип</option>
        @foreach($types as $type)
            <option value="{{ $type->id }}" @selected(old('type_id') == $type->id)>
                {{ $type->name }}
            </option>
        @endforeach
    </select>
    @error('type_id')
    {{$message}}
    @enderror
    <p><button type="submit">Добавить</button></p>
</form>
</body>
</html>

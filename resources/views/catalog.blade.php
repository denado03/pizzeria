<div>

    Каталог
    @auth
        <form method="POST" action="{{ route('logout') }}" style="display:inline">
            @csrf
            <button type="submit">
                Выйти
            </button>
        </form>
        <form method="POST" action="{{ route('cart') }}" style="display:inline">
            @csrf
            <button type="submit">
                Корзина
            </button>
        </form>
    @else
        <div>
            <a href="{{route('login')}}">Вход</a>
            <a href="{{route('register')}}">Регистрация</a>
        </div>
    @endauth

    <div>
        @foreach($products as $product)
            <div style="border: 1px solid"  >
                <label for="">Название</label>
                {{$product->name}}
                <br>
                <label for="">Описание</label>
                {{$product->description}}
                <br>
                <label for="">Цена</label>
                {{$product->price}}$
                <br>
                <a href="{{route('')}}">Добавить в заказ</a>
            </div>
        @endforeach
    </div>
</div>

<div>

    <a href="{{route('catalog', ['name' => 'Пицца'])}}">Пиццы</a>
    <a href="{{route('catalog', ['name' => 'Напиток'])}}">Напитки</a>
    @auth
        <div style="margin-left: 90%">
            <a href="{{route('orders.index')}}">Мои заказы</a>
            <form method="GET" action="{{ route('cart.index') }}" style="display:inline">
                <button type="submit">
                    Корзина
                </button>
            </form>
            <form method="POST" action="{{ route('logout') }}" style="display:inline">
                @csrf
                <button type="submit">
                    Выйти
                </button>
            </form>
        </div>
    @else
        <div style="margin-left: 90%">
            <a href="{{route('login')}}">Вход</a>
            <a href="{{route('register')}}">Регистрация</a>
        </div>
    @endauth
    <div>
        @if(session('success'))
            <div style="font-size: 18px; color:green">
                {{session('success')}}
            </div>
        @endif
        @if(session('error'))
                <div style="font-size: 18px; color:red">
                    {{session('error')}}
                </div>
        @endif
    </div>

    <div>
        <form action="">

        </form>
    </div>
    <div>
        @foreach($products as $product)
            <div style="border: 1px solid">
                <label for="">Название:</label>
                {{$product->name}}
                <br>
                <label for="">Описание:</label>
                {{$product->description}}
                <br>
                <label for="">Цена:</label>
                {{$product->price}}$
                <br>
                <form method="post" action="{{route('addToCart', $product->id)}}">
                    @csrf
                    <label for="">Количество</label>
                    <input type="number" name="quantity" value="1" min="1" max="99" required>
                    <input type="submit" value="Добавить в заказ">
                </form>
            </div>
        @endforeach

    </div>
</div>

<div>
    Корзина
    <div style="margin-left: 90%">
        <a href="{{route('catalog')}}">Каталог</a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline">
            @csrf
            <button type="submit">
                Выйти
            </button>
        </form>
    </div>

    <div>

        <div>
            @foreach($cartProducts as $cartProduct)
                <div style="border: 1px solid">
                    <label for="">Название:</label>
                    {{$cartProduct->product->name}}
                    <br>
                    <label for="">Цена:</label>
                    {{$cartProduct->product->price}}$
                    <br>
                    <label for="">Количество:</label>
                    {{$cartProduct->quantity}}
                    <br>
                    <form action="{{route('cart.delete', $cartProduct->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Удалить">
                    </form>
                </div>
            <div>
        </div>
            @endforeach
                Итого : {{$total}}$
        </div>
        @if($total == 0)
            Корзина пуста
        @else
            <div>
                <a href="{{route('order.index')}}">Оформить заказ</a>
            </div>
        @endif

    </div>
</div>

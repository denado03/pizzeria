<div>
    <h3>Оформление заказа</h3>
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
                </div>
            <div>
        </div>
            @endforeach
                Сумма заказа : {{$total}}$
                <hr>
        </div>
        <div>
            <h4>Заполните данные для доставки:</h4>
            <form method="post" action="">
                @csrf
                <label for="">Имя</label>
                <br>
                <input type="text" name="name">

                <br><label for="">Контактный номер</label>
                <br>
                <input type="text" name="phone_number" placeholder="+375()">
                <br>

                <label for="">Электронная почта</label>
                <br>
                <input type="text" name="email">
                <br>

                <label for="">Адрес доставки</label>
                <br>
                <input type="text" name="address">
                <br>

                <input type="hidden" value="{{$total}}">
                <input type="hidden" value="{{$cartProduct->product->name}}">
                <input type="hidden" value="{{$cartProduct->product->description}}">
                <input type="hidden" value="{{$cartProduct->product->price}}">
                <input type="hidden" value="{{$cartProduct->quantity}}">

                <button type="submit">Оформить заказ</button>
            </form>
        </div>
    </div>
</div>

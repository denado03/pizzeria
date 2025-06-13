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
            <form method="post" action="{{route('order.store')}}">
                @csrf
                <label for="">Имя</label>
                <br>
                <input type="text" name="name">
                @error('name')
                {{$message}}
                @enderror
                <br><label for="">Контактный номер</label>
                <br>
                <input type="text" name="phone_number" placeholder="+375">
                @error('phone_number')
                {{$message}}
                @enderror
                <br>

                <label for="">Электронная почта</label>
                <br>
                <input type="text" name="email">
                @error('email')
                {{$message}}
                @enderror
                <br>

                <label for="">Адрес доставки</label>
                <br>
                <input type="text" name="address">
                @error('address')
                {{$message}}
                @enderror
                <br>

                <input type="hidden" name="total" value="{{$total}}">
                @foreach($cartProducts as $index => $cartProduct)
                    <input type="hidden" name="products[{{$index}}][name]" value="{{$cartProduct->product->name}}">
                    <input type="hidden" name="products[{{$index}}][description]" value="{{$cartProduct->product->description}}">
                    <input type="hidden" name="products[{{$index}}][price]" value="{{$cartProduct->product->price}}">
                    <input type="hidden" name="products[{{$index}}][id]" value="{{$cartProduct->product->id}}">
                    <input type="hidden" name="products[{{$index}}][quantity]" value="{{$cartProduct->quantity}}">
                @endforeach

                <button type="submit">Оформить заказ</button>
            </form>
        </div>
    </div>
</div>

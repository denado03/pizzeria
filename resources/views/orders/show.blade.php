<div>
    <p><a href="{{route('orders.index')}}">Мои заказы</a></p>
    <p><a href="{{route('catalog')}}">Каталог</a></p>
    <div>
        <div style="border: 1px solid">
            <p href="">Заказ номер {{$order->id}}</p>
            <p>Имя: {{$order->name}}</p>
            <p>Адрес: {{$order->address}}</p>
            <p>Номер телефона: {{$order->phone_number}}</p>
            <p>Email: {{$order->email}}</p>
            <p>От {{$order->created_at}}</p>
            <p>Итоговая цена: {{$order->total_price}} $</p>
            <div>
                <h3>Список продуктов:</h3>
                @foreach($order_items as $item)
                    <div style="border: 1px solid green">
                    <p>Название: {{$item->product_name}}</p>
                    <p>Цена: {{$item->price}}</p>
                    <p>Описание: {{$item->description}}</p>
                    <p>Количество: {{$item->quantity}}</p>
                    </div>
                @endforeach
            </div>
            </div>
    </div>
</div>

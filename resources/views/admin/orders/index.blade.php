<div>
    <p><a href="{{route('catalog')}}">Каталог</a></p>
    <div>
        @foreach($orders as $order)
            <div style="height: 50px; border: 1px solid">
                <a href="{{route('orders.show', ['order' => $order->id])}}">Заказ номер {{$order->id}}</a>
                <p>От {{$order->created_at}}</p>
            </div>
        @endforeach
    </div>
</div>

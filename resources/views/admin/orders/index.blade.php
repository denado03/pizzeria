<div>
    <h3>Заказы</h3>
    <a href="{{route('admin.dashboard')}}">Назад</a>
    <div>
        @foreach($orders as $order)
            <div style="height: 50px; border: 1px solid">
                <a href="{{route('admin.orders.show', ['order' => $order->id])}}">Заказ номер {{$order->id}}</a>
                <p>От {{$order->created_at}}</p>
            </div>
        @endforeach
    </div>
</div>

<div>
    <p><a href="{{route('admin.orders.index')}}">Все заказы</a></p>
    <div>
        @if(session('success'))
            <div>
                <div style="font-size: 18px; color:green">
                    {{session('success')}}
                </div>
            </div>
        @endif
    </div>
    <div>
        <div style="border: 1px solid">
            <p href="">Заказ номер {{$order->id}}</p>
            <p>Имя: {{$order->name}}</p>
            <p>Адрес: {{$order->address}}</p>
            <p>Номер телефона: {{$order->phone_number}}</p>
            <p>Email: {{$order->email}}</p>
            <p>От {{$order->created_at}}</p>
            <p>Итоговая цена: {{$order->total_price}} $</p>
            <form action="{{route('admin.orders.update', ['order' => $order->id])}}" method="post">
                @csrf
                @method('Put')

                <p>Время доставки:</p>
                <input name="delivery_time" type="datetime-local" value="{{$order->delivery_time}}">

                <p>Статус:</p>
                <select name="status" id="">
                    <option disabled selected>Выберите тип</option>
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}" {{$order->status_id == $status->id ? 'selected' : ''}} >
                            {{ $status->name }}
                        </option>
                    @endforeach
                </select>
                <p><button type="submit">Сохранить изменения</button></p>
            </form>
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

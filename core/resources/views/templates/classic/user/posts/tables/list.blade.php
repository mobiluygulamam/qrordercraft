@if($orders->isEmpty())
    <p>Bu masaya ait sipariş bulunmamaktadır.</p>
@else
    <ul>
        @foreach($orders as $order)
            <li>Sipariş ID: {{ $order->id }} - Ürün: {{ $order->product_name }} - Miktar: {{ $order->quantity }}</li>
        @endforeach
    </ul>
@endif
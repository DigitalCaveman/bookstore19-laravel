<ul>
    @foreach ($orders as $order)
        <li>
            <a href="order/{{$order->id}}">
                {{$order->title}}
            </a>
        </li>
    @endforeach
</ul>
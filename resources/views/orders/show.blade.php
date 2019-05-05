<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<ul>
    @foreach ($orders as $order)
        <li><a href="orders/findById{{$order->id}}">
                {{$order->total_price}}</a></li>
    @endforeach
</ul>
</body>
</html>
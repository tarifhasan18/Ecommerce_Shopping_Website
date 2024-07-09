<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <center>
        <h2>Customer Name: {{$data->name}}</h2>
        <h2>Customer Address:{{$data->rec_address}}</h2>
        <h2>Phone: {{$data->phone}}</h2>
        <h2>Product Title: {{$data->product->title}}</h2>
        <h2>Price: {{$data->product->price}}</h2>
        <img height="250px" width="300px" src="products/{{$data->product->image}}" alt="">
    </center>
</body>
</html>

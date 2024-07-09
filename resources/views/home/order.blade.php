<!DOCTYPE html>
<html>
    @include('home.css')
    <style>
        .div_center{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }
        table{
            border: 2px solid black;
            text-align: center;
            width: 900px;
        }
        th{
            border: 2px solid skyblue;
            background-color: black;
            color: white;
            font-size: 19px;
            text-align: center;
            padding: 10px;
        }
        td{
            border: 1px solid skyblue;
            padding: 10px;
        }
    </style>
<head>

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    <div class="div_center">
        <table>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Delivery Status</th>
                <th>Image</th>
            </tr>
            @foreach($order as $orders)
            <tr>
                <td>{{$orders->product->title}}</td>
                <td>{{$orders->product->price}}</td>
                <td>{{$orders->status}}</td>
                <td>
                    <img width="150px" height="200px" src="products/{{$orders->product->image}}" alt="">
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    @include('home.footer')
</body>

</html>

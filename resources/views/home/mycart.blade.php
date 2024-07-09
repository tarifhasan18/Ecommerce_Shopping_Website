<!DOCTYPE html>
<html>
    @include('home.css')
    <style>
        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px;
        }
        table{
            border: 2px solid black;
            text-align: center;
            width: 800px;
        }
        th{
            border: 2px solid black;
            text-align: center;
            font: 20px;
            font-weight: bold;
            background-color: black;
            color: white;
        }
        td{
            border: 1px solid skyblue;
        }
        .cart_value
        {
            text-align: center;
            margin-bottom:70px;
            padding: 1px;
            margin-left:430px;
            margin-top: -30px;
        }
        .order_deg{
            padding-right: 1px;
            margin-top: 30px;
        }
        label{
            display: inline-block;
            width: 150px;
        }
        .div_gap{
            padding: 5px;
        }
        input[type='text']{
            width: 450px;
            padding: 10px;
        }
        textarea{
            width: 450px;
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
    <!-- slider section -->
 <div class="div_deg">

    <div class="order_deg">
        <form action="{{url('confirm_order')}}" method="POST">
            @csrf
            <div class="div_gap">
                <label for="">Receiver Name</label>
                <input type="text" name="name" value="{{Auth::user()->name}}">
            </div>
            <div class="div_gap">
                <label for="">Receiver Address</label>
                <textarea name="address" id="" cols="30" rows="3">{{Auth::user()->address}}</textarea>
            </div>
            <div class="div_gap">
                <label for="">Receiver Phone</label>
                <input type="text" name="phone" value="{{Auth::user()->phone}}">
            </div>
            <div class="div_gap">
                <input class="btn btn-primary" type="submit" value="Cash On Delivery">
                <a class="btn btn-success" href="">Pay Using Card</a>
            </div>
        </form>

    </div>
    <table>
        <tr>
            <th>Product Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <?php
            $value = 0;
        ?>
        @foreach($cart as $cart)
        <tr>
            <td>{{$cart->product->title}}</td>
            <td>{{$cart->product->price}}</td>
            <td>
                <img width="200px" height="100px" src="products/{{$cart->product->image}}" alt="">
            </td>
            <td>
                <a class="btn btn-danger" href="{{url('delete_cart',$cart->id)}}">Remove</a>
            </td>

        </tr>
        <?php

            $value = $value + $cart->product->price;

        ?>
        @endforeach
    </table>
 </div>
 <div class="cart_value">
    <h3>Total Price: ${{$value}}</h3>
 </div>

@include('home.footer')



</body>

</html>

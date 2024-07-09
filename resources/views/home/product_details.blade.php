<!DOCTYPE html>
<html>
    @include('home.css');
    <style>
      .div_center{
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 30px;
      }
      .detail-box{
        padding: 15px;
      }
    </style>
<head>

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="box">
              <div class="div_center">
                <img width="400px" height="600px" src="/products/{{$product_details->image}}" alt="">
              </div>
              <div class="detail-box">
                <h6>{{$product_details->title}}</h6>
                <h6>Price:
                  <span>
                    ${{$product_details->price}}
                  </span>
                </h6>
              </div>

              <div class="detail-box">
                <h6>Category: {{$product_details->category}}</h6>
                <h6>Available Quantity:
                  <span>
                    {{$product_details->quantity}}
                  </span>
                </h6>
              </div>

              <div class="detail-box">
                  <p> {{$product_details->description}}</p>
              </div>


          </div>
        </div>
      </div>
    </div>
  </section>



@include('home.footer');



</body>

</html>


  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">
        @foreach($product as $p)
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
              <div class="img-box">
                <img src="products/{{$p->image}}" alt="">
              </div>
              <div class="detail-box">
                <h6>{{$p->title}}</h6>
                <h6>Price
                  <span>
                    {{$p->price}}
                  </span>
                </h6>
              </div>
              {{-- <div class="new">
                <span>
                  New
                </span>
              </div> --}}
              <div style="padding: 15px;">
                  <a class="btn btn-danger" href="{{url('product_details',$p->id)}}">Details</a>
                  <a class="btn btn-primary" href="{{url('add_cart',$p->id)}}">Add to Cart</a>
              </div>
          </div>
        </div>
        @endforeach
      </div>
      {{-- <div class="btn-box">
        <a href="">
          View All Products
        </a>
      </div> --}}
    </div>
  </section>

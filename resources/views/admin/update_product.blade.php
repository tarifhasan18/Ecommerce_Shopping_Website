<!DOCTYPE html>
<html>
  <head>
   @include('admin.css')
   <style>
    .update_product{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
    }
    label{
        display: inline-block;
        width: 250px;
        font-size: 18px!important;
        color: white!important;
    }
    input[type='text'],input[type='number'],textarea
    {
        width: 350px;
        padding: 10px;
        margin: 10px;
    }
    .categories{
        width: 350px;
        padding: 10px;
    }
</style>
  </head>
  <body>
    @include('admin.header')

    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
              <h1>Update Products</h1>
              <div class="update_product">
                  <form action="{{url('edit_product',$product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="">Product Title</label>
                        <input type="text" name="title" value="{{$product->title}}">
                    </div>
                    <div>
                        <label for="">Description</label>
                        <textarea name="description" style="height: 100px">{{$product->description}}</textarea>
                    </div>
                    <div>
                        <label for="">Category</label>
                        {{-- <input type="text" name="category" value="{{$product->category}}"> --}}
                        <select name="category" id="" class="categories">
                            <option value="{{$product->category}}" selected>{{$product->category}}</option>
                            @foreach($category as $c)
                                <option value="{{$c->category_name}}">{{$c->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="">Price</label>
                        <input type="number" name="price" value="{{$product->price}}">
                    </div>
                    <div>
                        <label for="">Quantity</label>
                        <input type="number" name="quantity" value="{{$product->quantity}}">
                    </div>
                    <div>
                        <label for="">Current Image</label>
                        <img src="/products/{{$product->image}}" width="100px" height="100px" alt="">
                    </div>
                    <br>
                    <div>
                        <label for="">Upload New Image</label>
                        <input type="file" name="image">
                    </div>
                    <div>
                        <input class="btn btn-success" type="submit" value="Update Product">
                    </div>

                  </form>
              </div>
          </div>
        </div>
      </div>
    <!-- JavaScript files-->
    <script src="/admincss/vendor/jquery/jquery.min.js"></script>
    <script src="/admincss/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="/admincss/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admincss/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="/admincss/vendor/chart.js/Chart.min.js"></script>
    <script src="/admincss/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="/admincss/js/charts-home.js"></script>
    <script src="/admincss/js/front.js"></script>
  </body>
</html>

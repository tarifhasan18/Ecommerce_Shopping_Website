<!DOCTYPE html>
<html>
  <head>
   @include('admin.css')
   <style>
       .add_product{
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
   </style>
  </head>
  <body>
    @include('admin.header')

    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
              <h1>Add Product</h1>
              <div class="add_product">
                    <form action="{{url('upload_product')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="">Product Title</label>
                            <input type="text" name="title" placeholder="Enter Product Title" required>
                        </div>
                        <div>
                            <label for="">Desscription</label>
                            <textarea name="description" id="" placeholder="Write Description"></textarea>
                        </div>
                        <div>
                            <label for="">Price</label>
                            <input type="text" name="price" placeholder="Enter Price" required>
                        </div>
                        <div>
                            <label for="">Quantity</label>
                            <input type="number" name="quantity" placeholder="Enter Quantity" required>
                        </div>
                        <div>
                            <label for="">Product Category</label>
                            <select name="category" id="">
                                <option value="" selected disabled>Please select an item</option>
                                @foreach($category as $c)
                                    <option value="{{$c->category_name}}">{{$c->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="">Product Image</label>
                            <input type="file" name="image" required>
                        </div>
                        <div>
                            <input class="btn btn-success" type="submit" value="Submit">
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

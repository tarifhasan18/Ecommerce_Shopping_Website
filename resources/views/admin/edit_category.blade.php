<!DOCTYPE html>
<html>
  <head>
   @include('admin.css')
   <style>
       input[type='text']
       {
           width: 400px;
           padding: 10px;
       }
       .update_data
       {
           display: flex;
           justify-content: center;
           align-items: center;
           margin: 30px;
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
            <h1>Update Data</h1>
                <div class="update_data">
                    <form action="{{url('edit_category',$data->id)}}" method="post">
                        @csrf
                        <input type="text" name="category" value="{{$data->category_name}}">
                        <input class="btn btn-success" type="submit" value="Update Category">
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

<!DOCTYPE html>
<html>
  <head>
   @include('admin.css')
   <style>
       input[type='text']
       {
           width: 400px;
           height: 50px;
           padding: 10px;
       }
       .div_deg
       {
           display: flex;
           justify-content: center;
           align-items: center;
           margin: 30px;
       }
        table {
            border-collapse: collapse;
            width: 70%;
        }

        th, td {
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even)
        {
            background-color: #f2f2f2
        }
        tr:nth-child(odd)
        {
            background-color: rgb(179, 255, 238);
        }

        th
        {
            background-color: #04AA6D;
            color: white;
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
            <h1 style="color: white;">Add Category</h1>
              <div class="div_deg">
                <form action="{{url('add_category')}}" method="POST">
                    @csrf
                    <div>
                        <input type="text" name="category" placeholder="Enter Category" required>
                    <input style="padding:10px; font-weight:bold;" class="btb btn-primary" type="submit" value="Add Category">
                    </div>
                </form>
              </div>

              <div>
                    <table class="table_deg">
                        <tr>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                        @foreach($data as $d)
                        <tr>
                            <td>{{$d->category_name}}</td>
                            <td><a class="btn btn-success" href="{{url('update_category',$d->id)}}">Edit</a>
                            <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_category',$d->id)}}">Delete</a></td>

                        </tr>
                        @endforeach
                    </table>
              </div>

          </div>
        </div>
      </div>
    <!-- JavaScript files-->
    <script>
        function confirmation(ev) {
          ev.preventDefault();
          var urlToRedirect = ev.currentTarget.getAttribute('href');
          console.log(urlToRedirect);
          swal({
            title: "Are you sure to delete this?",
            text: "This delete will be permanent",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.location.href = urlToRedirect;
            }
          });
        }
      </script>
    <script src="/admincss/vendor/jquery/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/admincss/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="/admincss/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admincss/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="/admincss/vendor/chart.js/Chart.min.js"></script>
    <script src="/admincss/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="/admincss/js/charts-home.js"></script>
    <script src="/admincss/js/front.js"></script>
  </body>
</html>

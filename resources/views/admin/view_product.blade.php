<!DOCTYPE html>
<html>
  <head>
   @include('admin.css')
   <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      text-align: left;
      padding: 8px;
      max-width: 200px; /* Set the desired maximum width */
      max-height: 200px; /* Set the desired maximum height */
    }

    tr:nth-child(even)
    {
        background-color: #f2f2f2
    }
    tr:nth-child(odd)
    {
        background-color: #bceedb
    }

    th {
      background-color: #04AA6D;
      color: white;
    }
    .product_items{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
    }
    .pagination{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .search_container{
        display: flex;
        justify-content: right;
        align-items: right;
    }
    .search_box{
        padding: 10px;
        width: 350px;
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
              <div class="search_container">
                  <form action="{{url('search_product')}}" method="get">
                    @csrf
                    <input class="search_box" type="text" name="search" placeholder="Search Here" required>
                    <input class="btn btn-success" type="submit" value="Search">
                  </form>
              </div>
            {{-- <h1>All Products</h1> --}}
            <div class="product_items">
                <table>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    @foreach($product as $p)
                    <tr>
                        <td>{{$p->title}}</td>
                        {{-- <td>{{$p->description}}</td> --}}
                        <td>{!!Str::limit($p->description,50)!!}</td>
                        <td>{{$p->price}}</td>
                        <td>{{$p->category}}</td>
                        <td>{{$p->price}}</td>
                        <td>
                            <div class="image-container">
                                <img style="width: 100px; height: 90px;" src="/products/{{$p->image}}" alt="">
                            </div>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{url('update_product',$p->id)}}">Edit</a>
                            <a style="margin: 5px;" class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product',$p->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </table>
            </div>
              <div class="pagination">
                {{$product->links()}}
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

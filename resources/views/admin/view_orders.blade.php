<!DOCTYPE html>
<html>
  <head>
   @include('admin.css')
   <style>
       .table_center{
           display: flex;
           justify-content: center;
           align-items: center;
       }
       table{
           border: 2px solid skyblue;
           text-align: center;
           width: 1000px;
       }
       th{
           background-color: skyblue;
           padding: 10px;
           font-size: 18px;
           font-weight: bold;
           text-align: center;
           color: yellow;
       }
       td{
           border: 1px solid skyblue;
           padding: 10px;
           color: white
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
                <div class="table_center">
                    <table>
                        <tr>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Product Title</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Change Status</th>
                            <th>Print PDF</th>
                        </tr>
                        @foreach($order as $orders)
                        <tr>
                            <td>{{$orders->name}}</td>
                            <td>{{$orders->rec_address}}</td>
                            <td>{{$orders->phone}}</td>
                            <td>{{$orders->product->title}}</td>
                            <td>{{$orders->product->price}}</td>
                            <td>
                                <img width="100px" height="100px" src="Products/{{$orders->product->image}}" alt="">
                            </td>
                            <td>
                                @if($orders->status == 'On the Way')
                                    <span style="color: skyblue">{{$orders->status}}</span>
                                @elseif($orders->status == 'Delivered')
                                <span style="color: yellow">{{$orders->status}}</span>
                                @else
                                <span style="color: red">{{$orders->status}}</span>
                                @endif
                            </td>
                            <td>
                                <a style="margin: 10px" class="btn btn-primary" href="{{url('on_the_way',$orders->id)}}">On the Way</a>
                                <a class="btn btn-success" href="{{url('delivered',$orders->id)}}">Delivered</a>
                            </td>
                            <td><a class="btn btn-secondary" href="{{url('print_pdf',$orders->id)}}">Print PDF</a></td>
                        </tr>
                        @endforeach
                    </table>

                </div>
          </div>
        </div>
      </div>
      @include('admin.js');
  </body>
</html>

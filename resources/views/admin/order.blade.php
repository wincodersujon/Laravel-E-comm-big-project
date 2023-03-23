<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">
    .title_deg
    {
        text-align: center;
        font-size: 40px;
        padding-top: 30px;
        font-weight: bold;
    }
    .center
    {
        margin:auto;
        width: 100%;
        border: 2px solid #fff;
        text-align: center;
        margin-top: 30px;
    }
    .th_color
    {
      background: #ef1f0c;
    }
    .th_deg
    {
        padding: 10px;
    }
    .img_size
    {
        height: 100px;
        width: 100px;
    }
   

    </style>
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{ session()->get('message')}}
                </div>
                    
                @endif

                <h1 class="title_deg">All Orders</h1>

                <div>
                  <form action="{{url('search')}}" method="GET" style="text-align:center;padding-top:30px;">
                    @csrf
                    <input style="color: black"; type="text" name="search" placeholder="Search For Something">
                    <input type="submit" value="Search" class="btn btn-outline-primary">
                  </form>
                </div>

                <table class="center">
                    <tr class="th_color">
                        <th class="th_deg">Name</th>
                        <th class="th_deg">Email</th>
                        <th class="th_deg">Address</th>
                        <th class="th_deg">Phone</th>
                        <th class="th_deg">Product title</th>
                        <th class="th_deg">Quantity</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Payment Status</th>
                        <th class="th_deg">Delivery Status</th>
                        <th class="th_deg">Image</th>
                        <th class="th_deg">Delivered</th>
                        <th class="th_deg">Print PDF</th>
                        <th class="th_deg">Send Email</th>
                        
                    </tr>

                    @forelse ($order as $order)
                    <tr>
                  <td>{{$order->name}}</td>
                  <td>{{$order->email}}</td>
                  <td>{{$order->address}}</td>
                  <td>{{$order->phone}}</td>
                  <td>{{$order->product_title}}</td>
                  <td>{{$order->quantity}}</td>
                  <td>${{$order->price}}</td>
                  <td>{{$order->payment_status}}</td>
                  <td>{{$order->delivery_status}}</td>
                  <td>
                      <img class="img_size" src="/product/{{$order->image}}">
                  </td>

                  <td>

                    @if($order->delivery_status=='processing')

                    <a onclick="return confirm('Are you sure this product is velivered !!!')" href="{{url('delivered',$order->id)}}" class="btn btn-primary">Delivered</a>

                    @else
                    <p style="color: green">Delivered</p>

                    @endif

                  </td>
                  <td>
                    <a style="height: 40px;width: 70px;" href="{{url('print_pdf',$order->id)}}"class="btn btn-secondary">Print PDF</a>
                  </td>
                  <td>
                    <a style="height: 40px;width: 70px;" href="{{url('send_email',$order->id)}}"class="btn btn-info">Print PDF</a>
                  </td>
              
                   </tr>
                   @empty
                       <div >
                        <td colspan="16">
                          No Data Found
                        </td>
                       </div>
                   

                  @endforelse
                   
                </table>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>

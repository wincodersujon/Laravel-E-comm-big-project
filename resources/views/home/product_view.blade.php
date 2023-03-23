<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          
         
          <div>
            <form action="{{url('search_product')}}" method="GET">

               @csrf
               <input style="width: 500px;" type="text" name="search" placeholder="Search for Something">
               <input style="border-radius: 5px;" type="submit" value="Search">
            </form>
          </div>
       </div>

       @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message')}}
                </div>
                    
                @endif
                
       <div class="row">

        @foreach ($product as $products)

          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{url('product_details',$products->id)}}" class="option1">
                      Product Details
                      </a>

                      @if($products->quantity > 0)
                      <label class="badge bg-success">In stock</label>
                      @else
                      <label class="badge bg-danger">Out of stock</label>
                      @endif
                      
                      <form action="{{url('add_cart',$products->id)}}" method="Post">
                        @csrf
                        <div class="row">
                           <div style="padding-top:30px" class="col-md-4">
                              <input type="number" name="quantity" value="1" min="1" style="width:100px;color:blue;">
                           </div>
                           <div class="col-md-4">
                              <br>
                              @if($products->quantity > 0)
                              <input type="submit" value="Add To Cart">
                              @endif
                              
                     
                             
                           </div>
                       
                     </div>
                      </form>

                   </div>
                </div>
                <div class="img-box">
                   <img style="height:90%; width:70%"
                   src="product/{{$products->image}}" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                     {{$products->title}}
                   </h5>

                   @if($products->discount_price!=null)
                   <h6 style="color: red">
                     Discount Price
                     <br>
                     ${{$products->discount_price}}
                  </h6>
                  <h6 style="text-decoration: line-through;color:blue">
                     Price
                     <br>
                     ${{$products->price}}
                  </h6>
                  @else
                   
                  <h6 style="color: blue">
                     Price
                     <br>
                     ${{$products->price}}
                  </h6>
                         
                  @endif
                  
                </div>
             </div>
          </div>

          @endforeach
          <span style="padding-top: 20px;">
          {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
         </span>
       </div>
   
    </div>
 </section>
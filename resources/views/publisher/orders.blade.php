@extends('app')
@section('content')

<nav class="navbar navbar-expand-lg bg-body-tertiary w-100" style="width:100%">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}">store</a>

      <a class="" href="{{route('pub_products')}}">products list</a>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
       
          @auth

                <a class="nav-link active ps-3 pe-4" aria-current="page" href="{{ route('logout')}}">Logout</a>
        
          @endauth
       
        

      </div>
    </div>
  </nav>
  
  <section>
    <div class="row g-3 d-flex justify-content-around  p-3">
        <div class="col-lg-3 col-md-5 col-11 row" style="margin-top:14px">
            <div class="col-6" >
                <div class="p-3 shadow-sm d-flex bg-white justify-content-around align-items-center rounded border">
                    <div>                      
                        <h3 class="fs-2 mycolor">
                        {{$count_products}}                        </h3>
    
                        <p class="fs-5 text-black">products</p>
                    </div>    
                   
                    <i class="uil uil-edit-alt fs-3 mycolor box rounded py-2  px-3"></i>          
                </div>

            </div>
            <div class="col-6">
                <div class="p-3 shadow-sm d-flex bg-white justify-content-around align-items-center rounded border">
                    <div>                      
                        <h3 class="fs-2 mycolor">
                        {{$count_orders}}         </h3>
                        <p class="fs-5 text-black">orders</p>
                    </div>    
                   
                    <i class="uil uil-edit-alt fs-3 mycolor box rounded py-2  px-3"></i>          
                </div>

            </div>
            
            
        </div>

        <div class="col-lg-3 col-md-5 col-11 ">
            <div class="p-3 shadow-sm d-flex bg-white justify-content-around align-items-center rounded border">
                <div>                      
                    <h3 class="fs-2 mycolor">
                    {{$delivered_orders}}         </h3>

                    <p class="fs-5 text-black">delivered orders</p>
                </div>    
               
                <i class="uil uil-edit-alt fs-3 mycolor box rounded py-2  px-3"></i>          
            </div>
           
        </div>

        <div class="col-lg-3 col-md-5 col-11">
            <div class="p-3 shadow-sm d-flex bg-white justify-content-around align-items-center rounded border">
                <div>
             

                    <h3 class="fs-2 mycolor">
                        {{$in_delivery_orders}}</h3>

                    <p class="fs-5 text-black">orders to deliver</p>
                </div>
                <i class="uil uil-book-reader fs-3 mycolor box rounded py-2  px-3 "></i>
            </div>
        </div>

        <div class="col-lg-3 col-md-5 col-11">
            <div class="p-3  shadow-sm d-flex bg-white justify-content-around align-items-center rounded  border"> 
                <div>
                    <h3 class="fs-2 mycolor">{{$pending_orders}}</h3>
                    <p class="fs-5 text-black">orders pending</p>
                </div>
                <i class="uil uil-bookmark fs-3 mycolor rounded py-2  px-3 box"></i>
                
            </div>
        </div>

        
        
    </div>
    <div class="d-flex">
        <h4 class="ms-3 col">All Your orders:</h4>
     
            

   

    </div>
      
      <div class="table-responsive p-3">
      <table class="table bg-black text-white">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Status</th>
            <th scope="col">Product</th>
            <th scope="col">Image</th>
            <th scope="col">Quantity</th>
            <th scope="col">Size</th>
            <th scope="col">Color</th>
            <th scope="col">Full Name</th>
            <th scope="col">Phone</th>
            <th scope="col">City</th>
            <th scope="col">Address</th>
            <th scope="col">Comment</th>
            <th scope="col">Ordered</th>
            <th scope="col">Updated</th>
           
            <th scope="col "class="text-end pe-5">Action</th>
         
          </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                
                <th scope="row">{{ $loop->index+1}}</th>
                <td>{{$order->status}}</td>
                <td>{{$order->product->title}}</td>
                <td><img src='{{asset("images/{$order->product->main_image}")}}' style='width:100px'></td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->size}}</td>
                <td>{{$order->color}}</td> 
                <td>{{$order->full_name}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->city}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->comment}}</td>
                <td>{{$order->created_at->diffForhumans()}}</td> 
                <td>{{$order->updated_at->diffForhumans()}}</td>
                <td class="text-end"><button type="button"  data-id="{{ $order->id }}" id="edit-order" class="btn btn-success btn-sm me-2" style="width:60px" >Edit</button>
                    <form action="{{ route('Order.destroy', $order->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                   </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      {!!$orders->links()!!}
    </div>
  </section>


@include('modals.edit_order')
@include('ajax.store')


@endsection
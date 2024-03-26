@extends('app')
@section('content')

<nav class="navbar navbar-expand-lg bg-body-tertiary w-100" style="width:100%">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}">store</a>

      <a class="" href="{{route('pub_orders')}}">orders list</a>
       
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
        <h4 class="ms-3 col">All Your Plats:</h4>
     
            <button type="button" class="  btn btn-primary btn-rounded text-end me-3 " data-bs-toggle="modal" data-bs-target="#exampleModal">+ Add Product</button>

   

    </div>
      
      <div class="table-responsive p-3">
      <table class="table bg-black text-white">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Orders</th>
            <th scope="col">Price</th>
            <th scope="col">x-price</th>
            <th scope="col">Image</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
           
            <th scope="col "class="text-end pe-5">Action</th>
         
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <th scope="row">{{ $loop->index+1}}</th>
                <td>{{$product->title}}</td>
                <td>{{$product->orders->count()}}</td>
                <td>{{$product->price}}درهم </td>
                <td>{{$product->x_price}}درهم</td>
                <td><img src='{{asset("images/$product->main_image")}}' style='width:100px'></td>
                <td>{{$product->created_at->diffForhumans()}}</td> 
                <td>{{$product->updated_at->diffForhumans()}}</td>
                <td class="text-end"><button type="button"  data-id="{{ $product->id }}" id="edit-Product" class="btn btn-success btn-sm me-2" style="width:60px" id="edit-plat">Edit</button>
                    <form action="{{ route('Product.destroy', $product->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                   
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      {!!$products->links()!!}
    </div>
  </section>


@include('modals.add_product')
@include('modals.edit_product')
@include('ajax.store')


@endsection
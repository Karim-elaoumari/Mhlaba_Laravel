@extends('app')
@section('content')
<style>
  @media (max-width: 767px) {
    .carousel-inner .carousel-item > div {
        display: none;
    }
    .carousel-inner .carousel-item > div:first-child {
        display: block;
    }
}

.carousel-inner .carousel-item.active,
.carousel-inner .carousel-item-next,
.carousel-inner .carousel-item-prev {
    display: flex;
}

/* medium and up screens */
@media (min-width: 768px) {
    
    .carousel-inner .carousel-item-end.active,
    .carousel-inner .carousel-item-next {
      transform: translateX(25%);
    }
    
    .carousel-inner .carousel-item-start.active, 
    .carousel-inner .carousel-item-prev {
      transform: translateX(-25%);
    }
}

.carousel-inner .carousel-item-end,
.carousel-inner .carousel-item-start { 
  transform: translateX(0);
}
</style>
<nav class="navbar navbar-expand-lg bg-body-tertiary w-100" style="width:100%">
    <div class="container"  style="min-width:100%">
      <a class="navbar-brand" href="{{route('home')}}">Mhlaba</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Pages
            </a>
           
            <ul class="dropdown-menu">
              @auth
              <li><a class="dropdown-item" href="{{ route('user.profile')}}">My Porfile</a></li>
             
            <li><a class="dropdown-item" id="swal_user_deny"  @if (Auth::user()->role!=0) href="{{route('store')}}" @endif>My Store</a></li>
            @endauth
             
            @auth
            @if (Auth::user()->role==2)
            <li><a class="dropdown-item" href="{{ route('admin.dash')}}">My Dashboard</a></li>
          @endif
            @endauth
             
            
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('plats')}}">Plats</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categories
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another </a></li>
              <li><a class="dropdown-item" href="#">Another </a></li>
              <li><a class="dropdown-item" href="#">Another </a></li>
            
              
            </ul>

          </li>
          
          @guest
          
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('login')}}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('register')}}">Register</a>
          </li>
          @endguest
          
          
        </ul>
        @auth
        
                <a class="nav-link active ps-3 pe-4" aria-current="page" href="{{ route('logout')}}">Logout</a>
        
          @endauth
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        

      </div>
    </div>
  </nav>
  <nav style="min-width:100%;" class="row bg-white p-3 " aria-label="breadcrumb">
    <ol class="breadcrumb col ms-2">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page"></li>
    </ol>
    @auth
        
       
    <span class="nav-link active col-7 fs-3 " aria-current="page" href="#"> Welcome {{Auth::user()->username}}</span>


   

@endauth
  </nav>


  <section>
   
     
      
      <div class=" my-2 container ">
        <div class="row ">
            <div class="col-12 col-lg-6 col-md-6">
                <img src="{{ asset("images/".$plat->image) }}"style="width:100%"  class="card-img-top" alt="...">
            </div>
            <div class="col-12 col-lg-6 col-md-6 bg-white p-5">
                <h3>Title :{{$plat->title}}</h3>
                <h3 class="mt-4">Price :{{$plat->price}} $</h3>

                <div class="mt-4"> 
                 <h4>   Description : </h4>
                    {{$plat->desc}}
                </div>

            </div>
         
        </div>

       
     </div>
    <script>


$(document).on('click','#swal_user_deny',function(e){
  e.preventDefault();
  Swal.fire({
  icon: 'error',
  title: 'Oops  Wait For Admin To Switch your Accout to Publisher',
  text: 'Something went wrong!',
})


})


    </script>

  </section>

@endsection
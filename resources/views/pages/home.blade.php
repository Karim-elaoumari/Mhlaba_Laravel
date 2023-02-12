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
              <li><a class="dropdown-item" href="#">My Porfile</a></li>
              <li><a class="dropdown-item" href="{{route('store')}}">My Store</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Plats</a>
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
    <div id="" class="carousel slide" style="width: 97%;margin:auto">
       
      <div class="cover_image " style="background-image: url({{asset('images/cover.jpg')}});background-size:cover; border-radius:10px;min-height:300px"  >
        <div class="container mb-4">
            <div class="row">
                <div class="col-md-12 p-5 pb-5 text-white">
                    <h5 class="fw-bolder">Welcome !</h5>
                    <p class="fs-4 fw-bold"></p>
                  
                    <h5>Enjoy Your Day</h5>
                </div>
            </div>
        </div>
    </div>
        
       
      </div>
     
      
      <div class="text-center my-2 container">
        <h2 class="font-weight-light">Some Featured Plats:</h2>
        <div class="row mx-auto my-auto justify-content-center ">
            <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                  @foreach($plats as $key => $plat)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" >
                      
                      <div class="col-12 col-md-4 col-lg-3 col-sm-6 " style="margin-auto;cursor:pointer">
                        <div class="card" style="width:94%;margin-auto;height:360px">
                          <img src="{{ asset("images/".$plat->image) }}"style="min-height:170px;max-height:170px;"  class="card-img-top" alt="...">
                          <div class="card-body">
                            <p class="card-text fs-4 ">{{ $plat->title }}</p>
                            <p class="card-text text-red">Price : {{ $plat->price }} $</p>
                            <p class="card-text" id="desc">
                              {{ substr($plat->desc, 0, 100) }}...
                          </p>
                        
                          </div>
                        </div>
                      </div>
                     
                    </div>
                  @endforeach

                    
                    
                    
                 
                </div>
                <script>
                  $(document).ready(function() {
                      $("#show-details").click(function() {
                          $("#desc").html("{{ $plat->desc }}");
                          $("#show-details").hide();
                          $("#hide-details").show();
                      });
              
                      $("#hide-details").click(function() {
                          $("#desc").html("{{ substr($plat->desc, 0, 100) }}...");
                          $("#hide-details").hide();
                          $("#show-details").show();
                      });
                  });
              </script>
            
              
              
              
              
              
                <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
        <div align="center" class="mt-4 mb-4"> 
          <button type="button" class="btn btn-primary">DISPLAY ALL PLATS</button>
        </div>
    </div>
    <script>
      let items = document.querySelectorAll('.carousel .carousel-item')

items.forEach((el) => {
    const minPerSlide = 4
    let next = el.nextElementSibling
    for (var i=1; i<minPerSlide; i++) {
        if (!next) {
            // wrap carousel by using first child
        	next = items[0]
      	}
        let cloneChild = next.cloneNode(true)
        el.appendChild(cloneChild.children[0])
        next = next.nextElementSibling
    }
})

    </script>

  </section>


@endsection
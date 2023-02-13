@extends('app')
@section('content')

<nav class="navbar navbar-expand-lg bg-body-tertiary w-100" style="width:100%">
    <div class="container-fluid">
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
              <li><a class="dropdown-item" href="{{ route('user.profile')}}">My Porfile</a></li>
              <li><a class="dropdown-item"   @if (Auth::user()->role!=0) href="{{route('store')}}"@else id="swal_user_deny" @endif>My Store</a></li>
              @if (Auth::user()->role==2)
              <li><a class="dropdown-item" href="{{ route('admin.dash')}}">My Dashboard</a></li>
               @endif
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
  <nav style="margin:0" class="bg-white row p-3" aria-label="breadcrumb">
    <ol class="breadcrumb col ms-2">
      <li class="breadcrumb-item"><a href="{{route('store')}}">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Users</li>
    </ol>
    @auth
       
    <span class="nav-link active col-7 fs-3 " aria-current="page" href="#"> Welcome {{Auth::user()->username}}</span>


   

@endauth
  </nav>
  <section class=" row  mt-3 px-3">
    @if (session('success_name'))
   <script>
    Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Name Has Been Changed',
  showConfirmButton: false,
  timer: 1500
})
   </script>
  
@endif
@if (session('success_pass'))
<script>
 Swal.fire({
position: 'top-end',
icon: 'success',
title: 'Name Has Been Changed',
showConfirmButton: false,
timer: 1500
})
</script>

@endif
 
        <div class=" col-lg-4 col-12 col-md-6 container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-12 col-xl-4 w-100">
      
              <div class="card" style="border-radius: 15px;">
                <div class="card-body text-center">
                  <div class="mt-3 mb-4">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                      class="rounded-circle img-fluid" style="width: 100px;" />
                  </div>
                  <h4 class="mb-2">{{Auth::user()->username}}</h4>
                  <p class="text-muted mb-4">{{Auth::user()->email}} <span class="mx-2">|</span> <a
                      href="">Professional</a></p>
                 
                  
                  <div class="d-flex justify-content-around text-center mt-5 mb-2">
                    <div class="mt-5">
                      <p class="mb-2 h5">{{$count_plats}}</p>
                      <p class="text-muted mb-0">Number Of Plats</p>
                    </div>
                    <div class="mt-5">
                      <p class="mb-2 h5">
                        @if (Auth::user()->role==0)
                        User
                        @elseif(Auth::user()->role==1)
                            Publisher
                        @else
                            Super Admin
                        @endif</p>
                      <p class="text-muted mb-0">Type of Profile</p>
                    </div>
                  </div>
                </div>
              </div>
      
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12  container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-md-12 col-xl-4 w-100" >
        
                <div class="card" style="border-radius: 15px;">
                  <div class="card-body text-center row " style="min-height:400px">
                    <div class="col-lg-6 col-md-6 col-12"  style="height:300px">
                        <form action="{{route('update_name')}}" method="post">
                        <h4 class="mt-4">Edit Name</h4>
                        @csrf
                         <div class="mb-3 mt-5">
                            <input type="text" class="form-control @error('name') {{'is-invalid'}} @enderror" name="name" value="{{old('name')}}"  placeholder="{{Auth::user()->username}}">
                           
                          </div>
                          <div class="mb-3">
                           
                            <input type="password" name="password" class="form-control @error('password') {{'is-invalid'}} @enderror"  placeholder="Confirme Password">
                            @error('password')
                            <p class="text-danger"> {{$message}}</p>
                        @enderror
                          </div>
                          <button type="submit" class="btn btn-info w-100" style="margin-top:53px">Edit Name</button>
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12" style="height:300px">
                        <h4 class="mt-4">Edit Password</h4>
                        <form action="{{route('update_pass')}}" method="post">
                            <div class="mb-3 mt-5">
                               @csrf
                               <input type="password" name="last_password" class="form-control @error('last_password') {{'is-invalid'}} @enderror" value="{{old('last_password')}}"  placeholder="Last Password">
                               @error('last_password')
                                   <p class="text-danger"> {{$message}}</p>
                               @enderror
                             </div>
                             <div class="mb-3">
                               
                               <input type="password" name="new_password" class="form-control @error('new_password') {{'is-invalid'}} @enderror" value="{{old('new_password')}}"  placeholder="New Password">
                               @error('new_password')
                               <p class="text-danger"> {{$message}}</p>
                               @enderror
                             </div>
                             <div class="mb-3">
                              
                                <input type="password" name="conf_password" class="form-control @error('conf_password') {{'is-invalid'}} @enderror" value="{{old('conf_password')}}"  placeholder="Confirme Password">
                                @error('conf_password')
                                <p class="text-danger"> {{$message}}</p>
                                @enderror
                              </div>
                           
                             
                           
                            <button type="submit" class="btn btn-info w-100 ">Edit Password</button>
                        </form>
                        </div>
                    </div>

                  </div>
                </div>
        
              </div>
            </div>
          </div>



        
    
  </section>
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


@endsection
@extends('app')
@section('content')
<section class="h-100 h-custom" >
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-8 col-xl-6">
          @if (session('success'))
                <p class="alert alert-success">Well Done : {{session('success')}}</p>
          @endif
          @if (session('password'))
          <p class="alert alert-danger">Error : {{session('password')}} !!!</p>
          @endif
          <div class="card rounded-3">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
              class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
              alt="Sample photo">
            <div class="card-body p-4 p-md-5">
                
               
              <form class="px-md-2" align="center" action="{{ route('login.action')}}" method="post">
                @csrf
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Login Info</h3>
  
                
  
               
                  <div class="">
  
                    <div class="form-outline datepicker mb-4">
                      <input type="email"  name="email" class="form-control" id="exampleDatepicker1" placeholder="E-mail"  />
                     
                    </div>
  
                  </div>
              
               
                    <div class="">
    
                      <div class="form-outline datepicker mb-3">
                        <input type="password" name="password"class="form-control" id="exampleDatepicker1" placeholder="Password" />
                       
                      </div>
    
                    </div>
                    <input type="checkbox" name="remember"> Remember Me 
                
                <button type="submit" class="btn btn-success btn-lg mb-2 ms-5">Submit</button><br>
                <a href="register" >Dont have Account Yet</a>
                <a href="forget-pass" >Forget My Password</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    
@endsection
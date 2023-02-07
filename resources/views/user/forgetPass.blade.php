@extends('app')
@section('content')
<section class="h-100 h-custom" >
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-8 col-xl-6">
          @if (session('success'))
                <p class="alert alert-success">Well Done : {{session('success')}}</p>
          @endif
         
          <div class="card rounded-3">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
              class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
              alt="Sample photo">
            <div class="card-body p-4 p-md-5">
                
              <form class="px-md-2" align="center" action="{{ route('forget.password.action')}}" method="post">
                @csrf
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Forget Password</h3>
                  <div class="">
                    <div class="form-outline datepicker mb-4">
                      <input type="email"  name="email" class="form-control" id="exampleDatepicker1" placeholder="E-mail"  />
                      @if (session('email'))
                      <p class="text-danger">Error : {{session('email')}} !!!</p>
                      @endif
                    </div>
                  </div>
                <button type="submit" class="btn btn-success btn-lg mb-2 ms-5">Submit</button><br>
                <a href="register" >Dont have Account Yet</a>
                <a href="login" >I remember my password</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    
@endsection
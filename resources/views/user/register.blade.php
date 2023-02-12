@extends('app')
@section('content')
<section class="h-100 h-custom" >
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-8 col-xl-6">
          <div class="card rounded-3">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
              class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
              alt="Sample photo">
            <div class="card-body p-4 p-md-5">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Info</h3>
                 @if ($errors->any())
                @foreach ($errors as $error)
                <p class="alert alert-danger">Error : {{$error}} !!!!</p>
                    
                @endforeach
                    
                @endif
  
              <form class="px-md-2" action="{{ route('register.action')}}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-6 mb-4">
  
                    <div class="form-outline datepicker">
                      <input type="text" name="username" class="form-control" id="exampleDatepicker1" placeholder="{{ old('username')}}"/>
                      <label for="exampleDatepicker1" class="form-label">User Name</label>
                    </div>
  
                  </div>
                  <div class="col-md-6">
  
                    <div class="form-outline">
                      <input type="email" name="email" id="form3Example1w" class="form-control" placeholder="{{ old('email')}}" />
                      <label class="form-label" for="form3Example1w">E-Mail</label>
                    </div>
  
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
    
                      <div class="form-outline datepicker">
                        <input type="password" name="password" class="form-control" id="exampleDatepicker1" />
                        <label for="exampleDatepicker1" class="form-label">Password</label>
                      </div>
    
                    </div>
                    <div class="col-md-6">
    
                      <div class="form-outline">
                        <input type="password" name="confirmPassword" id="form3Example1w" class="form-control" />
                        <label class="form-label" for="form3Example1w">Confirm Password</label>
                      </div>
    
                    </div>
                  </div>
                <button type="submit" class="btn btn-success btn-lg mb-1">Submit</button>
                 <a href="/" class="ms-3" >Go Home </a>
              </form>
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    
@endsection
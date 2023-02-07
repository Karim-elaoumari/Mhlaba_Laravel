@extends('app')
@section('content')


@auth
<h1> hello {{Auth::user()->username}}
    <h2>hello preson who logged in</h2>
    <a href="{{ route('change_pass')}}">change password</a>
    <a href="{{ route('logout')}}">logout</a>
@endauth
@guest
    <h2>hello  normal persons</h2>
@endguest
@endsection
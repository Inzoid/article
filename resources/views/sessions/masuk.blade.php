
@extends('layout.main')
@section('container')
@section('title', 'Login')

    <div class="site-section py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="heading-39101 mb-5">
              <h3>Login</h3>
            </div>

        @if(session('notice'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                  <strong>{!!session('notice') !!}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                  </button>
          </div>
        @endif

  <form action="{{ route('login.store') }}" method="post">
   {{ csrf_field() }}

            <div class="form-group">
                <span class="text-danger">{!! $errors->first('email') !!}</span>
                    <input type="text" name="email" class="form-control" placeholder="Email">
            </div>

            <div class="form-group">
                <span class="text-danger">{!! $errors->first('password') !!}</span>
                    <input type="password" name="password" class="form-control" placeholder="Password">
            </div>

            <div class="form-group row">
                <div class="col-md-6 mr-auto">
                  <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" 
                  value="Login">
                </div>
  

    </div>
    @endsection
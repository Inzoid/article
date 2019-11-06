@extends('layout.main')
@section('container')
      <div class="container">           
        <br><br>
        <div class="mb-3">           
         <h3>New User</h3>
        </div>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('notice'))
          <div class="alert alert-success">
                  <strong>{!!session('notice') !!}</strong>
          </div>
    @endif

            <form action="{{ route('signup.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <span class="text-danger">{!! $errors->first('first_name') !!}</span>
                    <input type="text" name="first_name" class="form-control" placeholder="First Name">
               
            </div>
        
            <div class="form-group">
                <div class="text-danger">{!! $errors->first('last_name') !!}
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                </div>
            </div>

            <div class="form-group">
                <span class="text-danger">{!! $errors->first('email') !!}</span>
                    <input type="text" name="email" class="form-control" placeholder="Email">
            </div>

            <div class="form-group">
            <span class="text-danger">{!! $errors->first('password') !!}</span>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
        
            <div class="form-group">
            <span class="text-danger">{!! $errors->first('password_confirmation') !!}</span>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
            </div>
        

        <div class="form-group">
            <input type="submit" value="Create User" class="btn btn-primary btn-md text-white">
            <a href="/" class="btn btn-danger">Back</a>
        </div>

@endsection
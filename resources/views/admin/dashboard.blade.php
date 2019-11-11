@extends('layout.main')
@section('container')

<div class="site-section py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="heading-39101 mb-5">
              <a href="{{ url('create')}}" class="btn btn-primary text-white">New Article</a><br><br>
                <h3>Welcome Admin</h3>          
            </div>

            <?php 
              $user = Sentinel::getUser();
              $role = $user->roles()->first()->slug;
            ?>

            <p>Selamat datang {{$role}} : {{$user->first_name}} {{$user->last_name}} </p>

@endsection
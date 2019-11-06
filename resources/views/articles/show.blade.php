@extends('layout.main')
@section('container')
@section('title', 'Detail Article')

<div class="site-section py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="heading-39101 mb-3">
              <h3>Detail Article</h3>
              <hr>
            </div>

<div class="card text-center">
  <div class="card-header bg-primary">
  <h3 class="text-white">{!! $article->title !!}</h3>
  </div>
  <div class="card-body">
    <p class="card-text">{!! $article->content !!}</p>
  </div>
  <div class="card-footer text-muted">
     Author : <i>{!! $article->author !!}</i>
  </div>
</div>
    <hr> 
        
        @if(session('notice'))
          <div class="alert alert-success">
                  <strong>{!!session('notice') !!}</strong>
          </div>
        @endif

  
      <div class="card">
        <div class="card-header bg-dark">
          <h4 class="text-white">Komentar</h4>
      </div>


        @foreach ($comments as $c)
        <div class="card">
            <div class="card-body">
                <h5>{!! $c->user !!}</h5>
                <p>{!! $c->content !!}</p>
            </div>
        </div>
        @endforeach
    </div>

    

    <div class="comment-form-wrap pt-5">

              </div>
            </div>
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


<div class="card">
  <div class="card-header bg-dark">
    <h5 class="text-white">Give Comment</h5>
  </div>
    

        <div class="card-body ">
          <div class="col-lg-8 mb-5 " >
            <form action="{{ route('comments.store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                    <label for="name">Name </label>
                    <input type="text" class="form-control" name="user">
                  </div>
        
                  <input type="hidden" name="article_id" class="form-control" value="{!! $article->id !!}">
               

                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="content" id="message" cols="10" rows="5" class="form-control"></textarea>
                  </div>
              
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn btn-primary btn-md text-white">
                    <a href="/" class="btn btn-danger">Back</a>
                  </div>

            

@endsection




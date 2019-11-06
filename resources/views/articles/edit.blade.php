@extends('layout.main')

@section('container')

<div class="site-section">
      <div class="container">
        <h1>Edit Article</h1>
        <form action="{{ route('articles.update', $articles->id) }}" method="post">
          {{ csrf_field() }}    {{ method_field('put') }}
      
        <div class="row">
          <div class="col-lg-8 mb-5" >
            <form action="#" method="post">
              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  <input type="text" name="title" class="form-control" placeholder="Title" 
                  value="{{ $articles->title }}">
                </div>
              </div>

              <div class="row">
          <div class="col-lg-8 mb-5" >
            <form action="#" method="post">
              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  <input type="text" name="author" class="form-control" placeholder="Author"
                  value="{{ $articles->author }}">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" name="content" id="" class="form-control" 
                  cols="30" rows="30" 
                  value="{{ $articles->content }}">
                </div>
              </div>
              
              <div class="form-group row">
                <div class="col-md-6 mr-auto">
                  <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Edit Artikel">
                </div>
              </div>
            </form>
          </div>
          
    </div> <!-- END .site-section -->

<div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>

        </div>
      </div>
      @endsection
    </footer>






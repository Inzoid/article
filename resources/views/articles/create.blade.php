@extends('layout.main')
@section('container')
@section('title', 'Create Article')

<div class="site-section">
      <div class="container">

        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}           
        <div class="mb-3">           
         <h3>New Artikel</h3>
        </div>

        @if(session('notice'))
          <div class="alert alert-success">
                  <strong>{!!session('notice') !!}</strong>
          </div>
        @endif
       
       
        <div class="row">
          <div class="col-lg-8 mb-5" >
              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  <input type="text" name="title" class="form-control" placeholder="Title">
                  <div class="text-danger">{{ $errors->first('title') }}</div>

                </div>
              </div>

        <div class="row">
          <div class="col-lg-8 mb-5" >
              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  <input type="text" name="author" class="form-control" placeholder="Author">
                  <div class="text-danger">{{ $errors->first('author') }}</div>
                </div>
              </div>


              <div class="form-group row">
                <div class="col-md-12">
                  <textarea name="content" id="" class="form-control" placeholder="Write your article." cols="30" rows="10"></textarea>
                  <div class="text-danger">{{ $errors->first('content') }}</div>
                </div>
              </div>
              
        <div class="row">
          <div class="col-lg-8 mb-5" >
              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                <input type="file" name="article_image" class="form-control" placeholder="Author">
                <div class="text-danger">{{ $errors->first('article_image') }}</div>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6 mr-auto">
                  <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Create Artikel">
                </div>

                <div class="col-md-6 mr-auto">
                  <a href="/" class="btn btn-info text-white py-3 px-5">Back</a>
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
    </footer>

@endsection
<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

  </body>

</html>
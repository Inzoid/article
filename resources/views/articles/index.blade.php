
@extends('layout.main')
@section('container')
@section('title', 'Article List')

    <div class="site-section py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="heading-39101 mb-5">
              <a href="{{ url('create')}}" class="btn btn-primary text-white">New Article</a><br><br>
                <h3>Articles List</h3>          
            </div>
        
        @if(session('notice'))
          <div class="alert alert-success alert-dismissible fade show" role="alert"">
                  <strong>{!!session('notice') !!}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    
                  </button>
          </div>
        @endif        

  

  @foreach ($articles as $a)
  <div class="card text-center">
  <div class="card-header bg-info">
  <h3  class="text-white">{!! $a->title !!}</h3>
  </div>
  <div class="card-body">
    <p class="card-text">{!! str_limit($a->content, 120) !!}</p>
  </div>
  <div class="card-footer text-muted">
     Author : <i>{!! $a->author !!}</i><br><br>

     <center>
  <form action="{{ route('articles.destroy', $a->id) }}" method="POST" >
    <a href="{{ route( 'articles.show', $a->id ) }}" class="btn btn-info">Detail</a>
    <a href="{{ route( 'articles.edit', $a->id ) }}" class="btn btn-success text-white">Edit</a>
    {{ csrf_field() }} {{ method_field('delete') }}
    <button class="btn btn-danger">Delete</button><br>
  </form>
</center>
  </div>
</div><br>
@endforeach

{{ $articles->links() }}

    
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

    </div>
    @endsection



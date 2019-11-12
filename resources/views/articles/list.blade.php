@foreach ($articles as $a)
  <div class="card text-center">
  <img src="{{ $a->img_article() }}" class="card-img-top">
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


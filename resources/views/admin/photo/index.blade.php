
@extends('admin.layout.admin')

@section('title', 'All Photos')

@section('pageTitle', 'All Photos')

@section('content')

<section class="content">

  <div class="container px-0">
    <div class="pp-gallery">
      <br>
      <div class="card-columns">

        @foreach($photos as $photo)

          <div class="card">
            <a href="{{ route('photo.show', $photo->id) }}">

              <img class="img-fluid" src="{{ asset($photo->path) }}" alt="{{ asset($photo->name) }}"/>

            </a>
          </div>

        @endforeach

        
      </div>
      </div>
  </div>

  <div class="pagination justify-content-center">
    <?php echo $photos->render(); ?>
  </div>

</section>

@endsection



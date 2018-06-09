

@extends('layouts.master')

@section('title', 'List of')

@section('content')
  <style>
    .row {
    margin: 15px;
  }
  </style>
<br><br><br>
    <!-- Header with Background Image -->
    <header class="business-header">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="display-3 text-center text-white mt-4"></h1>
          </div>
        </div>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">

      <h1>Anthology Photos</h1>
      <br>

      <div class="row">
        
        @foreach($photos as $photo)

          <a href="{{ asset($photo->path) }}" data-gallery="gallery" class="col-md-4" style="margin-bottom:10px">
            <img src="{{  asset($photo->path) }}" class="img-fluid">
          </a>

        @endforeach
      </div>

      <div class="pagination justify-content-center">
        <?php echo $photos->render(); ?>
      </div>

    </div>
    <!-- /.container -->

@endsection
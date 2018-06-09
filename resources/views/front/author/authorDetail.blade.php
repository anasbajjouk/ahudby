

@extends('layouts.master')

@section('title', 'Home')

@section('content')
  <br><br><br>
  <div class="container">
    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">{{ $author->name }}</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">Anthology Czech Music</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Born in : <strong>{{ $author->bd }}</strong>, Dead in : <strong>{{ $author->deathdate }}</strong> </p>

        <hr>

        <!-- Preview Image -->
        @if($author->photos->count() > 0 )
          <div id="demo" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                  <img class="d-block w-100" src="{{ $author->photos[1]->path }}" alt="{{ $author->photos[1]->name }}">
                </div> 
              @foreach($author->photos as $authorPic)
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{ $authorPic->path }}" alt="{{ $authorPic->name }}">
                </div>  
              @endforeach
            </div>
            
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div>
      
          <hr>
        @endif
        <!-- Post Content -->
        <p class="lead">{{ $author->bio }}</p>

        
        <hr>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Composition </h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  @foreach($authorCompositions as $composition)
                  <li>
                  <a href="{{  $composition->soundTrack }}">{{ $composition->name }}</a>
                  </li>
                  @endforeach
                </ul>
              </div>

            </div>
          </div>
        </div>

        <!-- Video Widget -->
        <div class="card my-4">
          <h5 class="card-header">Video</h5>
          <div class="card-body">
            @foreach($authorVideos as $video)
              <iframe  src="{{ $video->path }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            @endforeach
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->
  </div>


@endsection
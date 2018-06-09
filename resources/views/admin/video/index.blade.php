
@extends('admin.layout.admin')

@section('title', 'All Videos')

@section('pageTitle', 'All Videos')

@section('content')

@section('content')
  <style>
    .pb-video {
      border: 1px solid #e6e6e6;
      padding: 5px;
    }

    .pb-video:hover {
      background: #2c3e50;
    }

    .pb-video-frame {
      transition: width 2s, height 2s;
    }

    .pb-video-frame:hover {
      height: 300px;
    }

  </style>

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

      <h1>Anthology Videos</h1>
      <br>

      <div class="row">
        
        @foreach($videos as $video)

          <div class="col-md-3 pb-video">
            <iframe class="pb-video-frame" width="100%" height="230" src="{{ $video->path }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <label class="form-control label-warning text-center"><a href="{{route('video.show', $video->id) }}">{{ $video->name }}</a></label>
          </div>

        @endforeach

      </div>

      <br>

      <div class="pagination justify-content-center">
        <?php echo $videos->render(); ?>
      </div>

    </div>
    <!-- /.container -->

@endsection


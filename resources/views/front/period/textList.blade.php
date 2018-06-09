

@extends('layouts.master')

@section('title', 'List of')

@section('content')

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

      <h1>Anthology Texts</h1>
      <br>
      <div class="row">
        @foreach($periods as $period)

          <div class="col-sm-3 my-3" >
            <div class="card h-100">
              <img class="card-img-top" src="http://placehold.it/300x200 "  alt="">
              <div class="card-body">
                <h4 class="card-title">{{ $period->name }} <small>{{ $period->period }}</small></h4>
                <p class="card-text">{{  str_limit($period->detail,150) }}</p>
              </div>
              <div class="card-footer">
              <a href="{{ route('periodUserIndex', $period->id) }}" class="btn btn-primary">Find Out More!</a>
              </div>
            </div>
          </div>

        @endforeach

        
      </div>
      <!-- /.row -->
      <br>

      <div class="pagination justify-content-center">
        <?php echo $periods->render(); ?>
      </div>

    </div>
    <!-- /.container -->

@endsection
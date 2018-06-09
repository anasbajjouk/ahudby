
@extends('admin.layout.admin')

@section('title', 'All Compositions')

@section('pageTitle', 'All Compositions')

@section('content')

@section('content')

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
        @foreach($compositions as $composition)
          <div class="card text-center" style="margin:1%">
            <div class="card-header">
              <h3 class="card-title float-left">{{ $composition->name }}</h3>

                {!! Form::open(['method' => 'DELETE', 
                                'route' => ['composition.destroy', $composition->id] ,
                                'style' => 'display:inline',
                                'onsubmit' => "return confirm('Are you Sure?')" ]) !!}

                  {{ Form::button('<i class="fa fa-trash-alt"></i>', 
                                    ['type' => 'submit', 
                                    'class' => 'float-right btn btn-outline-danger btn-sm'] )  }}

                {!! Form::close() !!}
                  
            </div>
            <div class="card-body">
              <h4 class="card-title">{{-- $composition-> --}}</h4>
              <br>
              <p class="card-text">
                <audio controls>
                  <source src="{{ asset($composition->soundTrack) }}" type="audio/mpeg">
                </audio>
              </p>
            </div>
          </div>
        @endforeach


      </div>
      <br>

      <div class="pagination justify-content-center">
        <?php echo $compositions->render(); ?>
      </div>

    </div>
    <!-- /.container -->

@endsection


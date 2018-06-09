

@extends('layouts.master')

@section('title', 'Home')

@section('content')
  <br><br><br>
  <div class="container">
    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">{{ $period->name }}</h1>

        <!-- Date/Time -->
        <p>Born in : <strong>{{ $period->startDate }}</strong>, Dead in : <strong>{{ $period->endDate }}</strong> </p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">{{ $period->detail }}</p>

        
        <hr>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Historical Events</h5>
          <div class="card-body">
            @foreach($events as $event)

              <ul class="nav justify-content-center|justify-content-end">
                <li class="nav-item">
                    <a href="{{ $event->id }}"> {{str_limit($event->detail,50) }} </a>
                </li>

                <br>
                
              </ul>
              
            @endforeach
          </div>
        </div>


      </div>

    </div>
    <!-- /.row -->
  </div>
@endsection


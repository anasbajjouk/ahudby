
@extends('admin.layout.admin')

@section('title', 'Events')

@section('pageTitle', 'Events')

@section('content')

<section class="content">
    <div class="row">
        
        <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-xs-10">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title float-left">Period of the Event: {{ $event->period->name }}</h3>
                    <a href="{{ route('event.edit',$event->id) }}" class="btn btn-sm btn-warning float-right">Edit</a>
                </div>
                

                <div class="card-body">

                    <strong><i class="fa fa-birthday-cake mr-1"></i>Date</strong>

                    <p class="text-muted">{{ $event->date }}</p>

                    <hr>

                    <strong><i class="fa fa-audio-description mr-1"></i>Detail</strong>

                    <p class="text-muted">{{ $event->detail }} </p>

                </div>
            </div>

        </div>
    </div>

</section>

@endsection



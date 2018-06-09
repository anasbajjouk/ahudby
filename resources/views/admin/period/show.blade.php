
@extends('admin.layout.admin')

@section('title', 'Periods')

@section('pageTitle', 'Periods')

@section('content')

<section class="content">
    <div class="row">
        
        <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-xs-10">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title float-left">Period: {{ $period->name }}</h3>
                    <a href="{{ route('period.edit',$period->id) }}" class="btn btn-sm btn-warning float-right">Edit</a>
                </div>
                

                <div class="card-body">

                    <strong><i class="fa fa-birthday-cake mr-1"></i>Start Date - End Date</strong>

                    <p class="text-muted">{{ $period->startDate . ' - ' .  $period->startDate }}</p>

                    <hr>

                    <strong><i class="fa fa-audio-description mr-1"></i>Detail</strong>

                    <p class="text-muted">{{ $period->detail }} </p>

                    <hr>

                    <strong><i class="fa fa-image mr-1"></i>Images</strong>
                    
                    <div class="container">
                        <br>
                        <div class="row">
                            @foreach($period->photos as $period)
                                <a href="{{ $period->path }}" data-gallery="gallery" class="col-md-4" style="margin-bottom:1%">
                                    <img src="{{ $period->path }}" class="img-fluid rounded">
                                </a>
                            @endforeach
                            
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</section>

@endsection



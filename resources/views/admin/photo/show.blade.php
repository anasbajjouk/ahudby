
@extends('admin.layout.admin')

@section('title', 'Photo Detail')

@section('pageTitle', 'Photo Detail')

@section('content')

<section class="content">
    <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-xs-10">
        <div class="card card-primary">

            <div class="card-header">
                <h3 class="card-title float-left">{{ $photo->name }}</h3>
                <form action="{{ route('photo.destroy', $photo->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger float-right"><i class="fa fa-trash-alt"></i></button>
                </form>
                
            </div>

            <div class="card-body">

                <div class="card-columns">
                    <div class="card">
                        <a href="{{ route('photo.show', $photo->id) }}">
                            <img class="img-fluid" src="{{ asset($photo->path) }}" alt="{{ asset($photo->name) }}"/>
                        </a>
                    </div>

                    <div class="row">
                        <p>{{$photo->description}}</p>
                    </div>
                    
                </div>
                

            </div>

        </div>
    </div>

</section>

@endsection



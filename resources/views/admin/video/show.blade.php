
@extends('admin.layout.admin')

@section('title', 'Video')

@section('pageTitle', 'Video')

@section('content')

<section class="content">
    <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-xs-10">
        <div class="card card-primary">

            <div class="card-header">
                <h3 class="card-title float-left">{{ $video->name }}</h3>
                <form action="{{ route('video.destroy', $video->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger float-right"><i class="fa fa-trash-alt"></i></button>
                </form>
                
            </div>

            <div class="card-body" >
                <div class="card">
                    <a href="{{ route('video.show', $video->id) }}">
                        <iframe width="850" height="480" class="col-lg-12 col-xs-12"  src="{{ $video->path }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>   
                    </a>
                </div>
            </div>

        </div>
    </div>

</section>

@endsection



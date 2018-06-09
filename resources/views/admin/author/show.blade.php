
@extends('admin.layout.admin')

@section('title', 'Author\'s Profile')

@section('pageTitle', 'Author\'s Profile')

@section('content')

<section class="content">
    <div class="row">
        
        <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-xs-10">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title float-left">About {{ $author->name }}</h3>
                    <a href="{{ route('author.edit',$author->id) }}" class="btn btn-sm btn-warning float-right">Edit</a>
                </div>
                

                <div class="card-body">

                    <strong><i class="fa fa-birthday-cake mr-1"></i>Birth Date</strong>

                    <p class="text-muted">{{ $author->bd }}</p>

                    <hr>

                    <strong><i class="fa fa-exclamation mr-1"></i>Death Date</strong>

                    <p class="text-muted">{{ $author->deathdate }}</p>

                    <hr>

                    <strong><i class="fa fa-audio-description mr-1"></i>Biography</strong>

                    <p class="text-muted">{{ $author->bio }} </p>

                    <hr>

                    <strong><i class="fa fa-link mr-1"></i>Link</strong>

                    <p class="text-muted"><a href="{{ $author->externalLink }}">{{ $author->externalLink }}</a></p>

                    <hr>

                    <strong><i class="fa fa-image mr-1"></i>Images</strong>
                    
                    <div class="container">
                        <br>
                        <div class="row">
                            @foreach($author->photos as $author)
                                <a href="{{ $author->path }}" data-gallery="gallery" class="col-md-4" style="margin-bottom:1%">
                                    <img src="{{ $author->path }}" class="img-fluid rounded">
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



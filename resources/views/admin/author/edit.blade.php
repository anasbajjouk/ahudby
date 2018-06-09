
@extends('admin.layout.admin')

@section('title', 'Edit Author')

@section('pageTitle', 'Edit Author')

@section('content')

<section class="content">
    <div class="row">
        
        <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-xs-10">
            
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Author</h3>
            </div>


          <form role="form" action="{{ route('author.update', $author->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="card-body">

                <div class="form-group">
                  <label for="name">Full Name</label>
                <input type="text" class="form-control" name="name" value="{{ $author->name }}">
                </div>

                <div class="form-group">
                  <label for="bio">Biography</label>
                  <textarea name="bio" class="form-control" cols="30" rows="10">{{ $author->bio }}</textarea>
                </div>

                <div class="form-group">
                  <label for="externalLink">External Link</label>
                  <input type="url" class="form-control" name="externalLink" placeholder="www.example.com" value="{{ $author->externalLink }}">
                </div>

                <div class="form-group">
                  <label for="birthDate">Birth Date</label>
                  <input type="date" class="form-control" name="birthDate" placeholder="1995/03/25" value="{{ $author->bd }}">
                </div>

                <div class="form-group">
                  <label for="deathdate">Death Date</label>
                  <input type="date" class="form-control" name="deathdate" placeholder="1995/03/25" value="{{ $author->deathdate }}">
                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>

          </div>

        </div>
    </div>

</section>

@endsection
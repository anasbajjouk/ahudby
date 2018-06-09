
@extends('admin.layout.admin')

@section('title', 'Create Author')

@section('pageTitle', 'Create Author')

@section('content')

<section class="content">
    <div class="row">
        
        <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-xs-10">
            
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create Author</h3>
            </div>


            <form role="form" action="{{ route('author.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="form-group">
                  <label for="name">Full name</label>
                  <input type="text" class="form-control" name="name"  placeholder="Enter Full name" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                  <label for="birthdate">Birth Date</label>
                  <input type="date" class="form-control" name="birthdate" value="{{ old('birthdate') }}">
                </div>

                <div class="form-group">
                  <label for="deathdate">Death Date</label>
                  <input type="date" class="form-control" name="deathdate" value="{{ old('deathdate') }}">
                </div>

                <div class="form-group">
                  <label for="externalLink">External Links</label>
                  <input type="url" class="form-control" name="externalLink" placeholder="Enter a URL" value="{{ old('externalLink') }}">
                </div>

                <div class="form-group">
                  <label for="bio">Biography</label>
                  <textarea class="form-control" name="bio" cols="30" rows="10"></textarea>
                </div>

                <div class="form-group">
                  <label for="images">Upload Images</label>
                  <input type="file" class="form-control" name="images[]" multiple>
                </div>

                <div class="form-group">
                  <label for="imageName">Image(s) Name</label>
                  <input class="form-control" name="imageName" type="text" value="{{ old('imageName') }}">
                </div>

                <div class="form-group">
                  <label for="imageDescription">Image(s) Description</label>
                  <textarea class="form-control" name="imageDescription" cols="30" rows="10"></textarea>
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

@extends('admin.layout.admin')

@section('title', 'Create Photo')

@section('pageTitle', 'Create Photo')

@section('content')

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  
<section class="content">
    <div class="row">
        
        <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-xs-10">
            
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create Photo</h3>
            </div>

            <form role="form" action="{{ route('photo.store') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="card-body">

                <div class="form-group">
                  <label for="radio">This Image Belongs To : &nbsp </label>

                  <label style="margin-right:20px">
                    <input type="radio" name="radio" value="author" id="author"> Author 
                  </label>
                  <label>
                    <input type="radio" name="radio" value="period" id="period"> Period 
                  </label>
 
                </div>

                <div class="form-group" id="authorCategory" style="display:none">
                  <label for="">Author</label>
                  <select class="form-control" name="authorSelect">
                    @foreach($authors as $author)
                      <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group" id="periodCategory" style="display:none">
                  <label for="">Period</label>
                  <select class="form-control" name="periodSelect">
                    @foreach($periods as $period)
                      <option value="{{ $period->id }}">{{ $period->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="imageUpload">Upload Image</label>
                  <input type="file" class="form-control" name="imageUpload" >
                </div>

                <div class="form-group">
                  <label for="imageName">Image Name</label>
                  <input class="form-control" name="imageName" type="text" value="{{ old('imageName') }}">
                </div>

                <div class="form-group">
                  <label for="imageDescription">Image Description</label>
                  <textarea class="form-control" name="imageDescription" cols="30" rows="10">{{ old('imageDescription') }}</textarea>
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

<script>
  $(document).ready(function(){
      $("#period").click(function(){
        $("#periodCategory").show();
        $("#authorCategory").hide();
      });
      $("#author").click(function(){
        $("#authorCategory").show();
        $("#periodCategory").hide();
      });
  });
</script>

@endsection
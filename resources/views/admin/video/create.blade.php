
@extends('admin.layout.admin')

@section('title', 'Create Video')

@section('pageTitle', 'Create Video')

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
              <h3 class="card-title">Create Video</h3>
            </div>

            <form role="form" action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="card-body">

                <div class="form-group" id="authorCategory">
                  <label for="">Author</label>
                  <select class="form-control" name="authorSelect">
                    @foreach($authors as $author)
                      <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="name">Video Name</label>
                  <input class="form-control" name="name" type="text" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                  <label>Video URL:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i>https://www.youtube.com/watch?v=</i>
                      </span>
                    </div>
                    <input type="text" name='youtube' class="form-control float-right" placeholder="Youtube URL ID (eg. R0BcJjO21X8 )">
                  </div>
                  <!-- /.input group -->
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

@extends('admin.layout.admin')

@section('title', 'Create Composition')

@section('pageTitle', 'Create Composition')

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
              <h3 class="card-title">Create Composition</h3>
            </div>

            <form role="form" action="{{ route('composition.store') }}" method="POST" enctype="multipart/form-data">
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
                  <label for="name">Composition Name</label>
                  <input class="form-control" name="name" type="text" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                  <label for="description">Composition Description</label>
                  <textarea class="form-control" name="description" cols="30" rows="10">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                  <label for="date">Composition Date</label>
                  <input class="form-control" name="date" type="date" value="{{ old('date') }}">
                </div>

                <div class="form-group">
                  <label for="composition">Composition</label>
                  <input class="form-control" name="composition" type="file">
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

@extends('admin.layout.admin')

@section('title', 'Create Period')

@section('pageTitle', 'Create Period')

@section('content')

<section class="content">
    <div class="row">
        
        <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-xs-10">
            
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create Period</h3>
            </div>


            <form role="form" action="{{ route('period.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="form-group">
                  <label for="name">Period Name</label>
                  <input type="text" class="form-control" name="name"  placeholder="Enter Full Period name" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                  <label for="startDate">Start Date</label>
                  <input type="date" class="form-control" name="startDate" value="{{ old('startDate') }}">
                </div>

                <div class="form-group">
                  <label for="endDate">End Date</label>
                  <input type="date" class="form-control" name="endDate" value="{{ old('endDate') }}">
                </div>

                <div class="form-group">
                  <label for="detail">Detail</label>
                  <textarea class="form-control" name="detail" cols="30" rows="10">{{ old('detail') }}</textarea>
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
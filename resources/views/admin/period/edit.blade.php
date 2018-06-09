
@extends('admin.layout.admin')

@section('title', 'Edit Period')

@section('pageTitle', 'Edit Period')

@section('content')

<section class="content">
    <div class="row">
        
        <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-xs-10">
            
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Period</h3>
            </div>


          <form role="form" action="{{ route('period.update', $period->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="card-body">

                <div class="form-group">
                  <label for="name">Full Name</label>
                <input type="text" class="form-control" name="name" value="{{ $period->name }}">
                </div>

                <div class="form-group">
                  <label for="detail">Detail</label>
                  <textarea name="detail" class="form-control" cols="30" rows="10">{{ $period->detail }}</textarea>
                </div>

                <div class="form-group">
                  <label for="startDate">Start Date</label>
                  <input type="date" class="form-control" name="startDate" placeholder="1995/03/25" value="{{ $period->startDate }}">
                </div>

                <div class="form-group">
                  <label for="endDate">End Date</label>
                  <input type="date" class="form-control" name="endDate" placeholder="1995/03/25" value="{{ $period->endDate }}">
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
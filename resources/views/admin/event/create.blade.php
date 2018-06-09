
@extends('admin.layout.admin')

@section('title', 'Create Event')

@section('pageTitle', 'Create Event')

@section('content')

<section class="content">
    <div class="row">
        
        <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-xs-10">
            
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create Event</h3>
            </div>


            <form role="form" action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="form-group">
                  <label for="name">Event Detail</label>
                  <textarea type="text" class="form-control" name="detail"  placeholder="Event's Detail" cols="30" rows="10">{{ old('name') }}</textarea>
                </div>

                <div class="form-group">
                  <label for="date">Date</label>
                  <input type="text" class="form-control" name="date" value="{{ old('date') }}">
                </div>

                <div class="form-group">
                  <label for="">Period</label>
                  <select class="form-control" name="period" id="">
                    @foreach($periods as $period)
                      <option value="{{ $period->id }}">{{ $period->name }}</option>
                    @endforeach
                  </select>
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
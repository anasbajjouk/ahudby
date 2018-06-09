
@extends('admin.layout.admin')

@section('title', 'Create Editor')

@section('pageTitle', 'Create Editor')

@section('content')

<section class="content">
    <div class="row">
        
        <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-xs-10">
            
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create Editors</h3>
            </div>


            <form role="form" action="{{ route('users.store') }}" method="POST">
              @csrf
              <div class="card-body">

                <div class="form-group">
                  <label for="name">Full name</label>
                <input type="text" class="form-control" name="name"  id="name" placeholder="Enter Full name" value="{{old('name')}}">
                </div>

                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="{{old('email')}}">
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>

                <div class="form-group">
                  <label for="password_confirmation">Confirm Password</label>
                  <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Password">
                </div>

                <div class="form-group row">
                  <div class="col-lg-6">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="+420 888 888 888" value="{{old('phone')}}">
                  </div>
                  
                  <div class="col-lg-6">
                    <label for="password">Gender</label>
                    <select class="form-control" name="gender" id="gender">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class=" col-sm-offset-2 col-sm-10">
                    <div class="form-check">
                      <br>
                      <input type="checkbox" class="form-check-input" id="checkbox" value="1">
                      <label class="form-check-label" for="checkbox">Admin</label>
                    </div>
                  </div>
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
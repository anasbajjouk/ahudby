
@extends('admin.layout.admin')

@section('title', 'Edit Editor')

@section('pageTitle', 'Edit Editor')

@section('content')

<section class="content">
    <div class="row">
        
        <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-xs-10">
            
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Editor</h3>
            </div>


          <form role="form" action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="card-body">

                <div class="form-group">
                  <label for="name">Full name</label>
                <input type="text" class="form-control" name="name"  id="name" placeholder="Enter Full name" value="{{ $user->name }}">
                </div>

                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="{{ $user->email }}" disabled>
                </div>

                <div class="form-group">
                  <label for="address">Home Address</label>
                  <input type="text" class="form-control" name="address" id="address" placeholder="Home Address" value="{{ $user->address }}">
                </div>

                <div class="form-group">
                  <label for="birthDate">Birth Date</label>
                  <input type="date" class="form-control" name="birthDate" id="birthDate" placeholder="1995/03/25" value="{{ $user->birthDate }}">
                </div>

                <div class="form-group">
                    <label for="password">Gender</label>
                    <select class="form-control" name="gender" id="gender">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>

                <div class="form-group">
                  <label for="password_confirmation">Confirm Password</label>
                  <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Password">
                </div>

                <div class="form-group">
                  <label for="phone">Phone Number</label>
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="+420 888 888 888" value="{{ $user->phone }}">
                </div>

                <div class="form-group">
                  <label for="imageUpload">Upload Your Image</label>
                  <input type='file' class="form-control" name="imageUpload" accept=".png, .jpg, .jpeg" />
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